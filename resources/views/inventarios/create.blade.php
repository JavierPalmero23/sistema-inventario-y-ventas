@extends('layouts.app')

@section('content')
    <h1>Crear Inventario</h1>
    <form action="{{ route('inventarios.store') }}" method="POST">
        @csrf
        <div>
            <label>Producto:</label>
            <select name="id_producto" class="form-control">
                @foreach($productos as $producto)
                    <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Categoría:</label>
            <select name="id_cat" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_cat }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Fecha de Entrada:</label>
            <input type="date" name="fecha_entrada" class="form-control">
        </div>
        <div>
            <label>Fecha de Salida:</label>
            <input type="date" name="fecha_salida" class="form-control">
        </div>
        <div>
            <label>Movimiento:</label>
            <input type="number" name="movimiento" class="form-control">
        </div>
        <div>
            <label>Motivo:</label>
            <textarea name="motivo" class="form-control"></textarea>
        </div>
        <div>
            <label>Cantidad:</label>
            <input type="number" name="cantidad" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
