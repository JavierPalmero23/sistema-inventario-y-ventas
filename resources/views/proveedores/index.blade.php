<!-- resources/views/proveedores/index.blade.php -->

@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
    <div class="container">
        <h1>Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Crear Proveedor</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedores as $proveedores)
                    <tr>
                        <td>{{ $proveedores->id_proveedor }}</td>
                        <td>{{ $proveedores->nombre }}</td>
                        <td>{{ $proveedores->nombre_contacto }}</td>
                        <td>{{ $proveedores->correo }}</td>
                        <td>{{ $proveedores->telefono }}</td>
                        <td>
                            <a href="{{ route('proveedores.show', $proveedores->id_proveedor) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('proveedores.edit', $proveedores->id_proveedor) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('proveedores.destroy', $proveedores->id_proveedor) }}" method="POST" style="display:inline;">
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
