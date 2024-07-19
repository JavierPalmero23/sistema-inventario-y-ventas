@extends('layouts.app')

@section('content')
    <h1>Reporte de Ventas</h1>

    <form action="{{ route('reportes.ventas') }}" method="GET">
        <div>
            <label for="desde">Desde:</label>
            <input type="date" id="desde" name="desde" value="{{ $desde ?? '' }}" max="{{ date('Y-m-d') }}">
        </div>
        <div>
            <label for="hasta">Hasta:</label>
            <input type="date" id="hasta" name="hasta" value="{{ $hasta ?? '' }}" max="{{ date('Y-m-d') }}">
        </div>
        <button type="submit">Generar Reporte</button>
        <a href="{{ route('reportes.ventas.pdf', ['desde' => $desde, 'hasta' => $hasta]) }}">Descargar PDF</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <td>{{ $venta->cliente->nombre }}</td>
                    <td>{{ $venta->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
