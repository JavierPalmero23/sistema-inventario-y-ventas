<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente', 'productos')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('ventas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'fecha_venta' => 'required|date',
            'productos.*.id_producto' => 'required|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $venta = Venta::create([
                'id_cliente' => $request->id_cliente,
                'fecha_venta' => $request->fecha_venta,
                'total' => 0,
            ]);

            $total = 0;

            foreach ($request->productos as $productoData) {
                $producto = Producto::find($productoData['id_producto']);
                $cantidad = $productoData['cantidad'];

                if ($producto->existencia < $cantidad) {
                    throw new \Exception("Cantidad insuficiente para el producto: {$producto->nombre}");
                }

                // Reduce the quantity from the producto
                $producto->existencia -= $cantidad;
                $producto->save();

                $precio = $productoData['precio'];
                $total += $precio * $cantidad;

                $venta->productos()->attach($producto->id_producto, [
                    'cantidad' => $cantidad,
                    'precio' => $precio,
                ]);
            }

            $venta->total = $total;
            $venta->save();
        });

        return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente.');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('ventas.edit', compact('venta', 'clientes', 'productos'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'fecha_venta' => 'required|date',
            'productos.*.id_producto' => 'required|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio' => 'required|numeric|min:0.01',
        ]);

        DB::transaction(function () use ($request, $venta) {
            $venta->update([
                'id_cliente' => $request->id_cliente,
                'fecha_venta' => $request->fecha_venta,
                'total' => array_reduce($request->productos, function ($carry, $producto) {
                    return $carry + ($producto['cantidad'] * $producto['precio']);
                }, 0),
            ]);

            // Detach existing products
            $venta->productos()->detach();

            foreach ($request->productos as $productoData) {
                $producto = Producto::find($productoData['id_producto']);
                $cantidad = $productoData['cantidad'];

                if ($producto->existencia < $cantidad) {
                    throw new \Exception("Cantidad insuficiente para el producto: {$producto->nombre}");
                }

                // Reduce the quantity from the producto
                $producto->existencia -= $cantidad;
                $producto->save();

                $venta->productos()->attach($producto->id_producto, [
                    'cantidad' => $cantidad,
                    'precio' => $productoData['precio'],
                ]);
            }
        });

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $venta)
    {
        DB::transaction(function () use ($venta) {
            foreach ($venta->productos as $producto) {
                $productoModel = Producto::find($producto->id_producto);
                if ($productoModel) {
                    $productoModel->existencia += $producto->pivot->cantidad;
                    $productoModel->save();
                }
            }

            $venta->delete();
        });

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente.');
    }
}
