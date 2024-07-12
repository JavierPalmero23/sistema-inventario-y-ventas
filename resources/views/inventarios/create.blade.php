@extends('layouts.app')

@section('content')
    <h1>Create Inventario</h1>
    <form action="{{ route('inventarios.store') }}" method="POST">
        @csrf
        <div>
            <label>Producto:</label>
            <select name="id_producto">
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Categoria:</label>
            <select name="id_cat">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Fecha Entrada:</label>
            <input type="date" name="fecha_entrada">
        </div>
        <div>
            <label>Fecha Salida:</label>
            <input type="date" name="fecha_salida">
        </div>
        <div>
            <label>Movimiento:</label>
            <input type="number" name="movimiento">
        </div>
        <div>
            <label>Motivo:</label>
            <textarea name="motivo"></textarea>
        </div>
        <div>
            <label>Cantidad:</label>
            <input type="number" name="cantidad">
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
