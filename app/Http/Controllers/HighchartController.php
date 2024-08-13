<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\Compra;

class HighchartController extends Controller
{
    public function index()
    {
        $productos = Producto::select('nombre', 'existencia')->get();
        $productos_nombres = $productos->pluck('nombre');
        $productos_existencia = $productos->pluck('existencia');

        $ventas = Venta::select('fecha_venta', 'total')->get();
        $ventas_labels = $ventas->pluck('fecha_venta')->toArray();
        $ventas_data = $ventas->pluck('total')->toArray();

        $compras = Compra::select('fecha_compra', 'pc', 'cantidad')->get();
        $compras_labels = $compras->pluck('fecha_compra')->unique()->toArray();
        $compras_data = $compras->groupBy('fecha_compra')->map(function ($items) {
            return $items->sum(function ($compra) {
                return $compra->pc * $compra->cantidad;
            });
        })->values()->toArray();

        return view('dashboard', [
            'productosNombres' => $productos_nombres,
            'productosExistencia' => $productos_existencia,
            'ventasLabels' => $ventas_labels,
            'ventasData' => $ventas_data,
            'comprasLabels' => $compras_labels,
            'comprasData' => $compras_data,
        ]);
    }
}
