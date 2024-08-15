@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1>Detalles de la Cotización</h1>
    <p><strong>ID:</strong> {{ $cotizacion->id }}</p>
    <p><strong>Cliente:</strong> {{ $cotizacion->cliente ? $cotizacion->cliente->nombre : 'No especificado' }}</p>
    <p><strong>Fecha de Cotización:</strong> {{ $cotizacion->fecha_cot }}</p>
    <p><strong>Vigencia:</strong> {{ $cotizacion->vigencia }}</p>
    <p><strong>Total:</strong> ${{ $cotizacion->total }}</p>
    <p><strong>Comentarios:</strong> {{ $cotizacion->comentarios }}</p>

    <h3>Productos</h3>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizacion->detalles as $detalle)
                <tr>
                <td>
                    @if($detalle->producto->img)
                    <img src="{{ asset('storage/' . $detalle->producto->img) }}" alt="Producto Imagen" width="100px">
                    @else
                        Sin Imagen
                    @endif
                </td>
                    <td>{{ $detalle->producto ? $detalle->producto->nombre : 'No especificado' }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ $detalle->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('cotizaciones.index') }}" class="btn btn-primary">Volver</a>
    <form action="{{ route('cotizaciones.destroy', $cotizacion->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    <br>
    <br>
</div>
@endsection
