<!-- resources/views/cotizaciones/index.blade.php -->

@extends('layouts.app')

@section('title', 'Cotizaciones')

@section('content')
    <div class="container">
        <h1>Cotizaciones</h1>
        <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary">Crear Cotización</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cliente</th>
                    <th>Fecha de Cotización</th>
                    <th>Vigencia</th>
                    <th>Comentarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cotizaciones as $cotizacion)
                    <tr>
                        <td>{{ $cotizacion->id }}</td>
                        <td>{{ $cotizacion->producto->nombre }}</td>
                        <td>{{ $cotizacion->cliente->nombre }}</td>
                        <td>{{ $cotizacion->fecha_cot }}</td>
                        <td>{{ $cotizacion->vigencia }}</td>
                        <td>{{ $cotizacion->comentarios }}</td>
                        <td>
                            <a href="{{ route('cotizaciones.show', $cotizacion->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('cotizaciones.edit', $cotizacion->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('cotizaciones.destroy', $cotizacion->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
