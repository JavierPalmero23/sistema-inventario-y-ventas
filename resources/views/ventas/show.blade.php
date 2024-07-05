<!-- resources/views/ventas/show.blade.php -->

@extends('layouts.app')

@section('title', 'Detalle de Venta')

@section('content')
    <div class="container">
        <h1>Detalle de Venta</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Venta ID: {{ $venta->id }}</h5>
                <p class="card-text"><strong>Vendedor:</strong> {{ $venta->vendedor->nombre }}</p>
                <p class="card-text"><strong>Producto:</strong> {{ $venta->producto->nombre }}</p>
                <p class="card-text"><strong>Categoría:</strong> {{ $venta->categoria->nombre }}</p>
                <p class="card-text"><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
                <p class="card-text"><strong>Forma de Pago:</strong> {{ $venta->formaPago->tipo }}</p>
                <p class="card-text"><strong>Fecha de Venta:</strong> {{ $venta->fecha_venta }}</p>
                <p class="card-text"><strong>Cambio:</strong> {{ $venta->cambio }}</p>
                <p class="card-text"><strong>Subtotal:</strong> {{ $venta->subtotal }}</p>
                <p class="card-text"><strong>IVA:</strong> {{ $venta->iva }}</p>
                <p class="card-text"><strong>Total:</strong> {{ $venta->total }}</p>
                <a href="{{ route('ventas.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
@endsection
