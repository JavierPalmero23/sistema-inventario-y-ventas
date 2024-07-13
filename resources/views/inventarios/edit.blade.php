
@extends('layouts.app')

@section('title', 'Editar Inventario')

@section('content')
<div class="container">
<br>
    <h1>Editar Inventario</h1>
    <form action="{{ route('inventarios.update', $inventario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Producto:</label>
            <select name="id_producto" class="form-control">
                @foreach($productos as $producto)
                <option value="{{ $producto->id }}" {{ $inventario->id_producto == $producto->id ? 'selected' : '' }}>{{ $producto->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Categoria:</label>
            <select name="id_cat" class="form-control">
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $inventario->id_cat == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Fecha Entrada:</label>
            <input type="date" name="fecha_entrada" value="{{ $inventario->fecha_entrada }}" class="form-control">
        </div>
        <div>
            <label>Fecha Salida:</label>
            <input type="date" name="fecha_salida" value="{{ $inventario->fecha_salida }}" class="form-control">
        </div>
        <div>
            <label>Movimiento:</label>
            <input type="number" name="movimiento" value="{{ $inventario->movimiento }}" class="form-control">
        </div>
        <div>
            <label>Motivo:</label>
            <textarea name="motivo" class="form-control">{{ $inventario->motivo }}</textarea>
        </div>
        <div>
            <label>Cantidad:</label>
            <input type="number" name="cantidad" value="{{ $inventario->cantidad }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('inventarios.index') }}" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
@endsection
