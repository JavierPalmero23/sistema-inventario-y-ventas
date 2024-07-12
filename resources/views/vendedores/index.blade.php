<!-- resources\views\vendedores\index.blade.php -->
@extends('layouts.app')

@section('title', 'Vendedores')

@section('content')
    <div class="container">
        <h1>Vendedores</h1>
        <a href="{{ route('vendedores.create') }}" class="btn btn-primary">Crear Vendedor</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendedores as $vendedor)
                    <tr>
                        <td>{{ $vendedor->id_vendedor }}</td>
                        <td>{{ $vendedor->nombre }}</td>
                        <td>{{ $vendedor->correo }}</td>
                        <td>{{ $vendedor->telefono }}</td>
                        <td>
                            <!--aunno<a href="{{ route('vendedores.show', $vendedor->id_vendedor) }}" class="btn btn-info">Ver</a>-->
                            <a href="{{ route('vendedores.edit', $vendedor->id_vendedor) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('vendedores.destroy', $vendedor->id_vendedor) }}" method="POST" style="display:inline;">
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
