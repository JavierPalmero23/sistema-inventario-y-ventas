
@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
<div class="container">
    <br>
    <h1>Crear Categoría</h1>
    <br>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
@endsection
