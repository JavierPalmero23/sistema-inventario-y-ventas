@extends('layouts.app')

@section('content')
    <h1>Reporte de Compras</h1>

    <form action="{{ route('reportes.compras') }}" method="GET">
        <div>
            <label for="desde">Desde:</label>
            <input type="date" id="desde" name="desde" value="{{ $desde ?? '' }}" max="{{ date('Y-m-d') }}">
        </div>
        <div>
            <label for="hasta">Hasta:</label>
            <input type="date" id="hasta" name="hasta" value="{{ $hasta ?? '' }}" max="{{ date('Y-m-d') }}">
        </div>
        <button type="submit">Generar Reporte</button>
        <a href="{{ route('reportes.compras.pdf', ['desde' => $desde, 'hasta' => $hasta]) }}">Descargar PDF</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
                <tr>
                    <td>{{ $compra->id }}</td>
                    <td>{{ $compra->fecha_compra }}</td>
                    <td>{{ $compra->proveedor->nombre }}</td>
                    <td>{{ $compra->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
