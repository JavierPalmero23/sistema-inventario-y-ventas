
@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container">
<br>
    <h1>Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>Categoría</th>
                <th>Fecha Compra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id_producto }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->existencia }}</td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td>{{ $producto->fecha_compra }}</td>
                <td>
                    <!--aunno<a href="{{ route('productos.show', $producto->id_producto) }}" class="btn btn-info">Ver</a>-->
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
