@extends('layouts.app')

@section('content')
    <h1>Venta Details</h1>
    <p><strong>ID:</strong> {{ $venta->id }}</p>
    <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
    <p><strong>Fecha Venta:</strong> {{ $venta->fecha_venta }}</p>
    <p><strong>Total:</strong> {{ $venta->total }}</p>

    <h3>Productos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>{{ $producto->pivot->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('ventas.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
