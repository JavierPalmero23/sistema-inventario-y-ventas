<?php

namespace App\Http\Controllers;

use App\Models\Cotizacione;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotizacionController extends Controller
{
    public function index()
    {
        $cotizaciones = Cotizacione::with('cliente')->get();
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
            'id_cliente' => 'required',
            'fecha_cot' => 'required|date',
            'vigencia' => 'required|date',
            'comentarios' => 'nullable|string',
            'productos.*.id_producto' => 'required|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $cotizacion = Cotizacione::create([
                'id_cliente' => $request->id_cliente,
                'fecha_cot' => $request->fecha_cot,
                'total' => array_sum(array_map(fn($p) => $p['cantidad'] * $p['precio'], $request->productos)),
                'vigencia' => $request->vigencia,
                'comentarios' => $request->comentarios,
            ]);

            foreach ($request->productos as $producto) {
                $cotizacion->productos()->attach($producto['id_producto'], [
                    'cantidad' => $producto['cantidad'],
                    'precio' => $producto['precio'],
                ]);
            }
        });

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización creada exitosamente.');
    }

    public function show($id)
{
    $cotizacion = Cotizacione::with('cliente', 'detalles.producto')->find($id);

    if (!$cotizacion) {
        return redirect()->route('cotizaciones.index')->with('error', 'Cotización no encontrada.');
    }

    return view('cotizaciones.show', compact('cotizacion'));
}


public function edit($id)
{
    $cotizacion = Cotizacione::findOrFail($id);
    $clientes = Cliente::all();
    return view('cotizaciones.edit', compact('cotizacion', 'clientes'));
}



    public function update(Request $request, Cotizacione $cotizacion)
    {
        $request->validate([
            'id_cliente' => 'required',
            'fecha_cot' => 'required|date',
            'vigencia' => 'required|date',
            'comentarios' => 'nullable|string',
            'productos.*.id_producto' => 'required|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request, $cotizacion) {
            $cotizacion->update([
                'id_cliente' => $request->id_cliente,
                'fecha_cot' => $request->fecha_cot,
                'total' => array_sum(array_map(fn($p) => $p['cantidad'] * $p['precio'], $request->productos)),
                'vigencia' => $request->vigencia,
                'comentarios' => $request->comentarios,
            ]);

            $cotizacion->productos()->detach();

            foreach ($request->productos as $producto) {
                $cotizacion->productos()->attach($producto['id_producto'], [
                    'cantidad' => $producto['cantidad'],
                    'precio' => $producto['precio'],
                ]);
            }
        });

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización actualizada exitosamente.');
    }

    public function destroy(Cotizacione $cotizacion)
    {
        $cotizacion->delete();
        return redirect()->route('cotizaciones.index')->with('success', 'Cotización eliminada exitosamente.');
    }
}
