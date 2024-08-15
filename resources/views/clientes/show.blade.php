@extends('layouts.app')

@section('title', 'Detalle del Cliente')

@section('content')
<div class="container">
    <br>
    <h1>Detalle del Cliente</h1>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $cliente->nombre }}</h2>
            <p><strong>ID:</strong> {{ $cliente->id_cliente }}</p>
            <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
            <p><strong>Email:</strong> {{ $cliente->correo }}</p>
            <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
            <p><strong>Codigo Postal:</strong> {{ $cliente->codigo_postal }}</p>
            <p><strong>Regimen Fiscal:</strong> {{ $cliente->regimen_fiscal }}</p>
            <p><strong>Razon Social:</strong> {{ $cliente->razon_social }}</p>
            <p><strong>Fecha de Registro:</strong> {{ $cliente->created_at->format('d/m/Y') }}</p>

            <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver</a>
            <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    <br>
</div>
@endsection
