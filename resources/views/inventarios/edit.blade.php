@extends('layouts.app')

@section('content')
    <h1>Edit Inventario</h1>
    <form action="{{ route('inventarios.update', $inventario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Producto:</label>
            <select name="id_producto">
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" {{ $inventario->id_producto == $producto->id ? 'selected' : '' }}>{{ $producto->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Categoria:</label>
            <select name="id_cat">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $inventario->id_cat == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Fecha Entrada:</label>
            <input type="date" name="fecha_entrada" value="{{ $inventario->fecha_entrada }}">
        </div>
        <div>
            <label>Fecha Salida:</label>
            <input type="date" name="fecha_salida" value="{{ $inventario->fecha_salida }}">
        </div>
        <div>
            <label>Movimiento:</label>
            <input type="number" name="movimiento" value="{{ $inventario->movimiento }}">
        </div>
        <div>
            <label>Motivo:</label>
            <textarea name="motivo">{{ $inventario->motivo }}</textarea>
        </div>
        <div>
            <label>Cantidad:</label>
            <input type="number" name="cantidad" value="{{ $inventario->cantidad }}">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
