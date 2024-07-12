<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::with('producto', 'categoria')->get();
        return view('inventarios.index', compact('inventarios'));
    }

    public function create()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('inventarios.create', compact('productos', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required',
            'id_cat' => 'required',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date',
            'movimiento' => 'required|integer',
            'motivo' => 'nullable|string',
            'cantidad' => 'required|integer',
        ]);

        Inventario::create($request->all());

        return redirect()->route('inventarios.index')
                         ->with('success', 'Inventario creado exitosamente.');
    }

    public function show(Inventario $inventario)
    {
        return view('inventarios.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('inventarios.edit', compact('inventario', 'productos', 'categorias'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'id_producto' => 'required',
            'id_cat' => 'required',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date',
            'movimiento' => 'required|integer',
            'motivo' => 'nullable|string',
            'cantidad' => 'required|integer',
        ]);

        $inventario->update($request->all());

        return redirect()->route('inventarios.index')
                         ->with('success', 'Inventario actualizado exitosamente.');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('inventarios.index')
                         ->with('success', 'Inventario eliminado exitosamente.');
    }
}
