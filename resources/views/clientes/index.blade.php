<!-- resources/views/clientes/index.blade.php -->

@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <div class="container">
        <h1>Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">Crear Cliente</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>RFC</th>
                    <th>Razón Social</th>
                    <th>Código Postal</th>
                    <th>Regimen Fiscal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id_cliente }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->rfc }}</td>
                        <td>{{ $cliente->razon_social }}</td>
                        <td>{{ $cliente->codigo_postal }}</td>
                        <td>{{ $cliente->regimen_fiscal }}</td>
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
    </div>
@endsection
