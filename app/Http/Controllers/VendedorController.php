<?php

namespace App\Http\Controllers;

use App\Models\Vendedores;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedores::all();
        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:vendedores',
            'telefono' => 'required',
        ]);

        Vendedores::create($request->all());
        return redirect()->route('vendedores.index')
                         ->with('success', 'Vendedor creado con éxito.');
    }

    public function show(Vendedores $vendedor)
    {
        return view('vendedores.show', compact('vendedor'));
    }

    public function edit(Vendedores $vendedor)
    {
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(Request $request, Vendedores $vendedor)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:vendedores,correo,'.$vendedor->id_vendedor.',id_vendedor',
            'telefono' => 'required',
        ]);

        $vendedor->update($request->all());
        return redirect()->route('vendedores.index')
                         ->with('success', 'Vendedor actualizado con éxito.');
    }

    public function destroy(Vendedores $vendedor)
    {
        $vendedor->delete();
        return redirect()->route('vendedores.index')
                         ->with('success', 'Vendedor eliminado con éxito.');
    }
}
