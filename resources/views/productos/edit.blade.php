
@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container">
<br>
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $producto->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="id_cat">Categoría</label>
            <select name="id_cat" class="form-control" id="id_cat" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id_cat }}" {{ $categoria->id_cat == $producto->id_cat ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_compra">Fecha Compra</label>
            <input type="date" name="fecha_compra" class="form-control" id="fecha_compra" value="{{ $producto->fecha_compra }}" max="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="colore">Color</label>
            <input type="text" name="colore" class="form-control" id="colore" value="{{ $producto->colore }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion_corta">Descripción Corta</label>
            <input type="text" name="descripcion_corta" class="form-control" id="descripcion_corta" value="{{ $producto->descripcion_corta }}" required>
        </div>
        <input type="hidden" name="existencia" class="form-control" id="existencia" value="{{ $producto->existencia }}">
        <input type="hidden" name="pc" class="form-control" id="pc" value="{{ $producto->pc }}">
        <div class="form-group">
            <label for="descripcion_corta">Precio de Venta</label>
            <input type="number" name="pv" class="form-control" id="pv" value="{{ $producto->pv }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion_larga">Descripción Larga</label>
            <textarea name="descripcion_larga" class="form-control" id="descripcion_larga" required>{{ $producto->descripcion_larga }}</textarea>
        </div>
        <div>
            <label>Imagen del Producto:</label>
            <input type="file" name="img" class="form-control">
            @if($producto->img)
                <img src="{{ asset('storage/' . $producto->img) }}" alt="Imagen del Producto" style="max-width: 200px; margin-top: 10px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div>
@endsection
