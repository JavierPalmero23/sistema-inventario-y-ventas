<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'id_cat' => 'required',
            'fecha_compra' => 'required',
            'colore' => 'required',
            'existencia' => 'required',
            'pc'=>'required',
            'pv'=>'required',
            'descripcion_corta' => 'required',
            'descripcion_larga' => 'required'
            //,'img'=>'required'
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')
                         ->with('success', 'Producto creado con éxito.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'id_cat' => 'required',
            'fecha_compra' => 'required',
            'colore' => 'required',
            'existencia' => 'required|integer',
            'pc'=>'required',
            'pv'=>'required',
            'descripcion_corta' => 'required',
            'descripcion_larga' => 'required',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado con éxito.');
    }
}
