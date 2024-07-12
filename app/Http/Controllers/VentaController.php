<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Vendedores;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\FormasPago;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('vendedor', 'producto', 'categoria', 'cliente', 'formaPago')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $vendedores = Vendedores::all();
        $productos = Producto::all();
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        $formasPago = FormasPago::all();
        return view('ventas.create', compact('vendedores', 'productos', 'categorias', 'clientes', 'formasPago'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_vendedor' => 'required|exists:vendedores,id_vendedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'id_cat' => 'required|exists:categorias,id_cat',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_pago' => 'required|exists:formas_pagos,id_pago',
            'fecha_venta' => 'required|date',
            'cambio' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        Venta::create($request->all());
        return redirect()->route('ventas.index')
                         ->with('success', 'Venta creada con éxito.');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $vendedores = Vendedores::all();
        $productos = Producto::all();
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        $formasPago = FormasPago::all();
        return view('ventas.edit', compact('venta', 'vendedores', 'productos', 'categorias', 'clientes', 'formasPago'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'id_vendedor' => 'required|exists:vendedores,id_vendedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'id_cat' => 'required|exists:categorias,id_cat',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_pago' => 'required|exists:formas_pago,id_pago',
            'fecha_venta' => 'required|date',
            'cambio' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $venta->update($request->all());
        return redirect()->route('ventas.index')
                         ->with('success', 'Venta actualizada con éxito.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')
                         ->with('success', 'Venta eliminada con éxito.');
    }
}
