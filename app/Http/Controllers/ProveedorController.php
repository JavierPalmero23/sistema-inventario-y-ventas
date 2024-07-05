<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedores::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        Proveedores::create($request->all());
        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor creado con éxito.');
    }

    public function show(Proveedores $proveedores)
    {
        return view('proveedores.show', compact('proveedores'));
    }

    public function edit(Proveedores $proveedores)
    {
        return view('proveedores.edit', compact('proveedores'));
    }

    public function update(Request $request, Proveedores $proveedores)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $proveedores->update($request->all());
        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor actualizado con éxito.');
    }

    public function destroy(Proveedores $proveedores)
    {
        $proveedores->delete();
        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor eliminado con éxito.');
    }
}
