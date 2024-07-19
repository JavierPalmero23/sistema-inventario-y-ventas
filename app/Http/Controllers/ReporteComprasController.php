<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use PDF;

class ReporteComprasController extends Controller
{
    public function index(Request $request)
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');
        $compras = Compra::whereBetween('fecha_compra', [$desde, $hasta])->get();

        return view('reportes.compras', compact('compras', 'desde', 'hasta'));
    }

    public function downloadPDF(Request $request)
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');
        $compras = Compra::whereBetween('fecha_compra', [$desde, $hasta])->get();

        $pdf = PDF::loadView('reportes.compras_pdf', compact('compras', 'desde', 'hasta'));

        return $pdf->download('reporte_compras.pdf');
    }
}
