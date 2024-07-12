@extends('layouts.app')

@section('content')
    <h1>Inventarios</h1>

    <a href="{{ route('inventarios.create') }}" class="btn btn-primary mb-2">Crear Inventario</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Movimiento</th>
                <th>Motivo</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->id }}</td>
                    <td>{{ $inventario->producto->nombre }}</td>
                    <td>{{ $inventario->categoria->nombre }}</td>
                    <td>{{ $inventario->fecha_entrada }}</td>
                    <td>{{ $inventario->fecha_salida }}</td>
                    <td>{{ $inventario->movimiento }}</td>
                    <td>{{ $inventario->motivo }}</td>
                    <td>{{ $inventario->cantidad }}</td>
                    <td>
                        <!--<a href="{{ route('inventarios.show', $inventario->id) }}" class="btn btn-info btn-sm">Ver</a>-->
                        <a href="{{ route('inventarios.edit', $inventario->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
