
@extends('layouts.app')

@section('title', 'Compras')

@section('content')
<div class="container">
<br>
    <h1>Compras</h1>
    <a href="{{ route('compras.create') }}" class="btn btn-primary">Crear Compra</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio<br>Compra</th>
                <th>Precio<br>Venta</th>
                <th>Fecha<br>Compra</th>
                <th>Descuento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
            <tr>
                <td>{{ $compra->id }}</td>
                <td>{{ $compra->proveedor->nombre }}</td>
                <td>{{ $compra->producto->nombre }}</td>
                <td>{{ $compra->cantidad }}</td>
                <td>{{ $compra->pc }}</td>
                <td>{{ $compra->pv }}</td>
                <td>{{ $compra->fecha_compra }}</td>
                <td>{{ $compra->descuento }}</td>
                <td>
                    <!--aunno<a href="{{ route('compras.show', $compra->id) }}" class="btn btn-info">Ver</a>-->
                    <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" style="display:inline;">
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
