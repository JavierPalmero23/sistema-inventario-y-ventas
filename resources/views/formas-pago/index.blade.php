<!-- resources/views/formas-pago/index.blade.php -->

@extends('layouts.app')

@section('title', 'Formas de Pago')

@section('content')
    <div class="container">
        <h1>Formas de Pago</h1>
        <a href="{{ route('formas-pago.create') }}" class="btn btn-primary">Crear Forma de Pago</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formasPago as $formaPago)
                    <tr>
                        <td>{{ $formaPago->id_pago }}</td>
                        <td>{{ $formaPago->tipo }}</td>
                        <td>
                            <a href="{{ route('formas-pago.show', $formaPago->id_pago) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('formas-pago.edit', $formaPago->id_pago) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('formas-pago.destroy', $formaPago->id_pago) }}" method="POST" style="display:inline;">
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