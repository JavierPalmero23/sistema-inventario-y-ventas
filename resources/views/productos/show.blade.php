@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="container">
    <br>
    <h1>Detalle del Producto</h1>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $producto->nombre }}</h2>
            <p><strong>ID:</strong> {{ $producto->id_producto }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
            <p><strong>Fecha de Compra:</strong> {{ $producto->fecha_compra }}</p>
            <p><strong>Color:</strong> {{ $producto->colore }}</p>
            <p><strong>Descripción Corta:</strong> {{ $producto->descripcion_corta }}</p>
            <p><strong>Descripción Larga:</strong> {{ $producto->descripcion_larga }}</p>
            <p><strong>Existencia:</strong> {{ $producto->existencia }}</p>
            <p><strong>Precio de Compra:</strong> ${{ number_format($producto->pc, 2) }}</p>
            <p><strong>Precio de Venta:</strong> ${{ number_format($producto->pv, 2) }}</p>

            @if($producto->img)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $producto->img) }}" alt="Imagen del Producto" style="max-width: 300px;">
                </div>
            @else
                <p>No hay imagen disponible.</p>
            @endif

            <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
            <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    <br>
</div>
@endsection
