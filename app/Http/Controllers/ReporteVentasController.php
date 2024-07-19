<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use PDF;

class ReporteVentasController extends Controller
{
    public function index(Request $request)
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');
        $ventas = Venta::whereBetween('fecha_venta', [$desde, $hasta])->get();

        return view('reportes.ventas', compact('ventas', 'desde', 'hasta'));
    }

    public function downloadPDF(Request $request)
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');
        $ventas = Venta::whereBetween('fecha_venta', [$desde, $hasta])->get();

        $pdf = PDF::loadView('reportes.ventas_pdf', compact('ventas', 'desde', 'hasta'));

        return $pdf->download('reporte_ventas.pdf');
    }
}
