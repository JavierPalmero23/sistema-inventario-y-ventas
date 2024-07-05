<?php

namespace App\Http\Controllers;

use App\Models\Cotizacione;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index()
    {
        $cotizaciones = Cotizacione::with('producto', 'cliente')->get();
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function create()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('cotizaciones.create', compact('productos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'fecha_cot' => 'required|date',
            'vigencia' => 'required|date',
            'comentarios' => 'nullable|string',
        ]);

        Cotizacione::create($request->all());
        return redirect()->route('cotizaciones.index')
                         ->with('success', 'Cotización creada con éxito.');
    }

    public function show(Cotizacione $cotizacion)
    {
        return view('cotizaciones.show', compact('cotizacion'));
    }

    public function edit(Cotizacione $cotizacion)
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('cotizaciones.edit', compact('cotizacion', 'productos', 'clientes'));
    }

    public function update(Request $request, Cotizacione $cotizacion)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'fecha_cot' => 'required|date',
            'vigencia' => 'required|date',
            'comentarios' => 'nullable|string',
        ]);

        $cotizacion->update($request->all());
        return redirect()->route('cotizaciones.index')
                         ->with('success', 'Cotización actualizada con éxito.');
    }

    public function destroy(Cotizacione $cotizacion)
    {
        $cotizacion->delete();
        return redirect()->route('cotizaciones.index')
                         ->with('success', 'Cotización eliminada con éxito.');
    }
}
