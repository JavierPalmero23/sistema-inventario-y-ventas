
@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
<div class="container">
<br>
    <h1>Ventas</h1>
    <a href="{{ route('ventas.create') }}" class="btn btn-primary">Crear Venta</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha Venta</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->cliente->nombre }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <td>${{ $venta->total*1.16 }}</td>
                    <td>
                        <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info">Ver</a>
                        <!--<a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning">Editar</a>-->
                        <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline-block;">
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
