@extends('layouts.app')

@section('title', 'Inventario')

@section('content')
    <h1>Inventarios</h1>
    <a href="{{ route('inventarios.create') }}" class="btn btn-primary">Add New Inventario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Movimiento</th>
                <th>Motivo</th>
                <th>Cantidad</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->producto->name }}</td>
                    <td>{{ $inventario->categoria->name }}</td>
                    <td>{{ $inventario->fecha_entrada }}</td>
                    <td>{{ $inventario->fecha_salida }}</td>
                    <td>{{ $inventario->movimiento }}</td>
                    <td>{{ $inventario->motivo }}</td>
                    <td>{{ $inventario->cantidad }}</td>
                    <td>
                        <a href="{{ route('inventarios.show', $inventario->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('inventarios.edit', $inventario->id) }}"class="btn btn-warning">Editar</a>
                        <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
