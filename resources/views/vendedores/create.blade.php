<!-- resources/views/vendedores/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Vendedor')

@section('content')
    <div class="container">
        <h1>Crear Vendedor</h1>
        <form action="{{ route('vendedores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" id="correo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
