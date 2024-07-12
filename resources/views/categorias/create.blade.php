<!-- resources/views/categorias/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
    <div class="container">
        <h1>Crear Categoría</h1>
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-dark">Volver</a>
        </form>
    </div>
@endsection
