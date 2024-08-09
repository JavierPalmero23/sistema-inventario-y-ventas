<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedores;
use App\Models\Producto;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with('proveedor', 'producto')->get();
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        $proveedores = Proveedores::all();
        $productos = Producto::all();
        return view('compras.create', compact('proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'productos' => 'required|array',
            'productos.*.id_producto' => 'required|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.pc' => 'required|numeric|min:0',
            'productos.*.pv' => 'required|numeric|min:0',
            'fecha_compra' => 'required|date',
            'descuento' => 'nullable|numeric|min:0|max:100',
        ]);

        DB::transaction(function () use ($request) {
            foreach ($request->productos as $productoData) {
                // crear registro de compra
                Compra::create([
                    'id_proveedor' => $request->id_proveedor,
                    'id_producto' => $productoData['id_producto'],
                    'cantidad' => $productoData['cantidad'],
                    'pc' => $productoData['pc'],
                    'pv' => $productoData['pv'],
                    'fecha_compra' => $request->fecha_compra,
                    'descuento' => $request->descuento,
                ]);

                // actualizar producto
                $producto = Producto::where('id_producto', $productoData['id_producto'])->first();
                if ($producto) {
                    $producto->update([
                        'existencia' => $producto->existencia + $productoData['cantidad'],
                        'fecha_compra' => $request->fecha_compra,
                        'pc' => $productoData['pc'],
                        'pv' => $productoData['pv'],
                    ]);
                }

                // actuaklizr inventario
                $inventario = Inventario::where('id_producto', $productoData['id_producto'])->first();
                if ($inventario) {
                    $inventario->update([
                        'cantidad' => $inventario->cantidad + $productoData['cantidad'],
                        'movimiento' => $inventario->movimiento + 1,
                    ]);
                } else {
                    Inventario::create([
                        'id_producto' => $productoData['id_producto'],
                        'id_cat' => Producto::find($productoData['id_producto'])->id_cat,
                        'fecha_entrada' => now(),
                        'fecha_salida' => null,
                        'movimiento' => 1,
                        'cantidad' => $productoData['cantidad'],
                    ]);
                }
            }
        });

        return redirect()->route('compras.index')
                         ->with('success', 'Compra realizada exitosamente.');
    }

    public function show(Compra $compra)
    {
        return view('compras.show', compact('compra'));
    }

    public function edit(Compra $compra)
    {
        $proveedores = Proveedores::all();
        $productos = Producto::all();
        return view('compras.edit', compact('compra', 'proveedores', 'productos'));
    }

    public function update(Request $request, Compra $compra)
    {
        $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'productos' => 'required|array',
            'productos.*.id_producto' => 'required|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.pc' => 'required|numeric|min:0',
            'productos.*.pv' => 'required|numeric|min:0',
            'fecha_compra' => 'required|date',
            'descuento' => 'nullable|numeric|min:0|max:100',
        ]);

        DB::transaction(function () use ($request, $compra) {
            foreach ($request->productos as $productoData) {
                $compra->update([
                    'id_proveedor' => $request->id_proveedor,
                    'id_producto' => $productoData['id_producto'],
                    'cantidad' => $productoData['cantidad'],
                    'pc' => $productoData['pc'],
                    'pv' => $productoData['pv'],
                    'fecha_compra' => $request->fecha_compra,
                    'descuento' => $request->descuento,
                ]);

                $producto = Producto::where('id_producto', $productoData['id_producto'])->first();
                if ($producto) {
                    $producto->update([
                        'existencia' => $producto->existencia + $productoData['cantidad'],
                        'fecha_compra' => $request->fecha_compra,
                        'pc' => $productoData['pc'],
                        'pv' => $productoData['pv'],
                    ]);
                }

                $inventario = Inventario::where('id_producto', $productoData['id_producto'])->first();
                if ($inventario) {
                    $inventario->update([
                        'cantidad' => $inventario->cantidad + $productoData['cantidad'],
                        'movimiento' => $inventario->movimiento + 1,
                    ]);
                } else {
                    Inventario::create([
                        'id_producto' => $productoData['id_producto'],
                        'id_cat' => Producto::find($productoData['id_producto'])->id_cat,
                        'fecha_entrada' => now(),
                        'fecha_salida' => null,
                        'movimiento' => 1,
                        'cantidad' => $productoData['cantidad'],
                    ]);
                }
            }
        });

        return redirect()->route('compras.index')
                         ->with('success', 'Compra actualizada con éxito.');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')
                         ->with('success', 'Compra eliminada con éxito.');
    }
}
