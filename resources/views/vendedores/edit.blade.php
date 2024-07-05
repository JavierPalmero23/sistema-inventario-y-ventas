<!-- resources/views/vendedores/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Editar Vendedor')

@section('content')
    <div class="container">
        <h1>Editar Vendedor</h1>
        <form action="{{ route('vendedores.update', $vendedor->id_vendedor) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $vendedor->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" id="correo" value="{{ $vendedor->correo }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" value="{{ $vendedor->telefono }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
