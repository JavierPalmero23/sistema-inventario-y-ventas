<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedores;
use App\Models\Producto;
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
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'descuento' => 'nullable|numeric',
        ]);

        Compra::create($request->all());
        return redirect()->route('compras.index')
                         ->with('success', 'Compra creada con éxito.');
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
