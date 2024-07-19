
@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="container">
<br>
    <h1>Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="id_cat">Categoría</label>
            <select name="id_cat" class="form-control" id="id_cat" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id_cat }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_compra">Fecha Compra</label>
            <input type="date" name="fecha_compra" class="form-control" id="fecha_compra" max="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="colore">Color</label>
            <input type="text" name="colore" class="form-control" id="colore" required>
        </div>
        <div class="form-group">
            <label for="descripcion_corta">Descripción Corta</label>
            <input type="text" name="descripcion_corta" class="form-control" id="descripcion_corta" required>
        </div>
        <div class="form-group">
            <label for="descripcion_larga">Descripción Larga</label>
            <textarea name="descripcion_larga" class="form-control" id="descripcion_larga" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
@endsection
