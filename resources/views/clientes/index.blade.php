
@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="container">
<br>
    <h1>Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Crear Cliente</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Razón Social</th>
                <th>Código Postal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id_cliente }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->razon_social }}</td>
                <td>{{ $cliente->codigo_postal }}</td>
                <td>
                    <a href="{{ route('clientes.show', $cliente->id_cliente) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
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
