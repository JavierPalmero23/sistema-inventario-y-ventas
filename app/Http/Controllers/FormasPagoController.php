<?php

namespace App\Http\Controllers;

use App\Models\FormasPago;
use Illuminate\Http\Request;

class FormasPagoController extends Controller
{
    public function index()
    {
        $formasPago = FormasPago::all();
        return view('formas-pago.index', compact('formasPago'));
    }

    public function create()
    {
        return view('formas-pago.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
        ]);

        FormasPago::create($request->all());
        return redirect()->route('formas-pago.index')
                         ->with('success', 'Forma de pago creada con éxito.');
    }

    public function show(FormasPago $formaPago)
    {
        return view('formas-pago.show', compact('formaPago'));
    }

    public function edit(FormasPago $formaPago)
    {
        return view('formas-pago.edit', compact('formaPago'));
    }

    public function update(Request $request, FormasPago $formaPago)
    {
        $request->validate([
            'tipo' => 'required',
        ]);

        $formaPago->update($request->all());
        return redirect()->route('formas-pago.index')
                         ->with('success', 'Forma de pago actualizada con éxito.');
    }

    public function destroy(FormasPago $formaPago)
    {
        $formaPago->delete();
        return redirect()->route('formas-pago.index')
                         ->with('success', 'Forma de pago eliminada con éxito.');
    }
}
