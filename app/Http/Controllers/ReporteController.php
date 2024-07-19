<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Compra;
use PDF;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        $tipo_reporte = $request->input('tipo_reporte');
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        if ($tipo_reporte == 'ventas') {
            $data = Venta::whereBetween('fecha_venta', [$desde, $hasta])->get();
        } elseif ($tipo_reporte == 'compras') {
            $data = Compra::whereBetween('fecha_compra', [$desde, $hasta])->get();
        } else {
            $data = [];
        }

        return view('reportes.index', compact('data', 'tipo_reporte', 'desde', 'hasta'));
    }

    public function downloadPDF(Request $request)
    {
        $tipo_reporte = $request->input('tipo_reporte');
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        if ($tipo_reporte == 'ventas') {
            $data = Venta::whereBetween('fecha_venta', [$desde, $hasta])->get();
            $pdf = PDF::loadView('reportes.ventas_pdf', compact('data', 'desde', 'hasta'));
        } elseif ($tipo_reporte == 'compras') {
            $data = Compra::whereBetween('fecha_compra', [$desde, $hasta])->get();
            $pdf = PDF::loadView('reportes.compras_pdf', compact('data', 'desde', 'hasta'));
        } else {
            return redirect()->back()->with('error', 'Tipo de reporte no válido.');
        }

        return $pdf->download("reporte_{$tipo_reporte}.pdf");
    }
}
