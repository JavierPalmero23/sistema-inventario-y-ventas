<!-- resources/views/categorias/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>
        <form action="{{ route('categorias.update', $categoria->id_cat) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $categoria->nombre }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
