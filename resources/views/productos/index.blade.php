
@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container">
<br>
    <h1>Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
    <table class="table">
        <thead>
            <tr><th></th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>Precio<br>Compra</th>
                <th>Precio<br>Venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>
                    @if($producto->img)
                    <img src="{{ asset('storage/' . $producto->img) }}" alt="Producto Imagen" width="100px">

                    @else
                        Sin Imagen
                    @endif
                </td>
                <td>{{ $producto->id_producto }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->existencia }}</td>
                <td>{{ $producto->pc }}</td>
                <td>{{ $producto->pv }}</td>
                <td>
                    <a href="{{ route('productos.show', $producto->id_producto) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>
@endsection
