
@extends('layouts.app')

@section('title', 'Detalles Inventario')

@section('content')
<div class="container">
<br>
    <h1>Detalle Inventario</h1>
    <p>Producto: {{ $inventario->producto->name }}</p>
    <p>Categoria: {{ $inventario->categoria->name }}</p>
    <p>Fecha Entrada: {{ $inventario->fecha_entrada }}</p>
    <p>Fecha Salida: {{ $inventario->fecha_salida }}</p>
    <p>Movimiento: {{ $inventario->movimiento }}</p>
    <p>Motivo: {{ $inventario->motivo }}</p>
    <p>Cantidad: {{ $inventario->cantidad }}</p>
    <a href="{{ route('inventarios.edit', $inventario->id) }}">Edit</a>
    <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('inventarios.index') }}">Volver</a>
    <br>
</div>
@endsection
