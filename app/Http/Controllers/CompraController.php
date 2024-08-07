<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedores;
use App\Models\Producto;
use App\Models\Inventario;
use Illuminate\Http\Request;

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
            'id_producto' => 'required',
            'id_proveedor' => 'required',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'fecha_compra' => 'required|date',
            'descuento' => 'nullable|numeric|min:0|max:100',
        ]);

        $compra = Compra::create([
            'id_producto' => $request->id_producto,
            'id_proveedor' => $request->id_proveedor,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'fecha_compra' => $request->fecha_compra,
            'descuento' => $request->descuento,
        ]);

        // Actualizar o crear
        //$inventario = Inventario::where('id_producto', $request->id_producto)->first();
        $producto = Producto::where('id_producto', $request->id_producto)->first();

        if ($producto) {
            $producto->update([
                'existencia' => $producto->existencia + $request->cantidad,
                'fecha_compra' => $request->fecha_compra,
            ]);
        }

        /*if ($inventario) {
            // Si existe, actualizar
            $inventario->update([
                'cantidad' => $inventario->cantidad + $request->cantidad,
                'movimiento' => $inventario->movimiento + 1, // Puedes ajustar el tipo de movimiento según tus necesidades
                // Añade otros campos que necesites actualizar en el inventario
            ]);
        } else {
            
            Inventario::create([
                'id_producto' => $request->id_producto,
                'id_cat' => Producto::find($request->id_producto)->id_cat,
                'fecha_entrada' => now(),
                'fecha_salida' => null,
                'movimiento' => 1,
                'cantidad' => $request->cantidad,
            ]);
        }*/

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
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'descuento' => 'nullable|numeric',
        ]);

        $compra->update($request->all());
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
