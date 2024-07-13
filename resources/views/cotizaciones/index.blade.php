
@extends('layouts.app')

@section('title', 'Cotizaciones')

@section('content')
<div class="container">
<br>
    <h1>Lista de Cotizaciones</h1>
    <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary">Crear Compra</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha de Cotización</th>
                <th>Total</th>
                <th>Vigencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizaciones as $cotizacion)
            <tr>
                <td>{{ $cotizacion->id }}</td>
                <td>{{ $cotizacion->cliente->nombre }}</td>
                <td>{{ $cotizacion->fecha_cot }}</td>
                <td>{{ $cotizacion->total }}</td>
                <td>{{ $cotizacion->vigencia }}</td>
                <td>
                    <!--aunno<a href="{{ route('cotizaciones.show', $cotizacion->id) }}">Ver</a>-->
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
    <br>
</div>
@endsection
