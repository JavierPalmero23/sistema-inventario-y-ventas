<!-- resources/views/cotizaciones/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Cotización')

@section('content')
    <div class="container">
        <h1>Crear Cotización</h1>
        <form action="{{ route('cotizaciones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_producto">Producto</label>
                <select name="id_producto" class="form-control" id="id_producto" required>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_cliente">Cliente</label>
                <select name="id_cliente" class="form-control" id="id_cliente" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_cot">Fecha de Cotización</label>
                <input type="date" name="fecha_cot" class="form-control" id="fecha_cot" required>
            </div>
            <div class="form-group">
                <label for="vigencia">Vigencia</label>
                <input type="date" name="vigencia" class="form-control" id="vigencia" required>
            </div>
            <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea name="comentarios" class="form-control" id="comentarios"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
