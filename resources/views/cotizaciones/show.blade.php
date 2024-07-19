@extends('layouts.app')

@section('content')
<div class="container">
<br>
    <h1>Detalles de la Cotización</h1>
    <p>Cliente: {{ $cotizacion->cliente->nombre }}</p>
    <p>Fecha de Cotización: {{ $cotizacion->fecha_cot }}</p>
    <p>Vigencia: {{ $cotizacion->vigencia }}</p>
    <p>Total: {{ $cotizacion->total }}</p>
    <p>Comentarios: {{ $cotizacion->comentarios }}</p>
    <h2>Productos</h2>
    <ul>
        @foreach($cotizacion->productos as $producto)
            <li>{{ $producto->nombre }} - Cantidad: {{ $producto->pivot->cantidad }} - Precio: {{ $producto->pivot->precio }}</li>
        @endforeach
    </ul>
    <a href="{{ route('cotizaciones.index') }}">Volver</a>
<br>
</div>
@endsection
