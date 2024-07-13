
@extends('layouts.app')

@section('title', 'Editar Cotización')

@section('content')
<div class="container">
<br>
    <h1>Editar Cotización</h1>
    <form action="{{ route('cotizaciones.update', $cotizacion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_producto">Producto</label>
            <select name="id_producto" class="form-control" id="id_producto" required>
                @foreach($productos as $producto)
                <option value="{{ $producto->id_producto }}" {{ $cotizacion->id_producto == $producto->id_producto ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_cliente">Cliente</label>
            <select name="id_cliente" class="form-control" id="id_cliente" required>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id_cliente }}" {{ $cotizacion->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_cot">Fecha de Cotización</label>
            <input type="date" name="fecha_cot" class="form-control" id="fecha_cot" value="{{ $cotizacion->fecha_cot }}" max="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="vigencia">Vigencia</label>
            <input type="date" name="vigencia" class="form-control" id="vigencia" value="{{ $cotizacion->vigencia }}" required>
        </div>
        <div class="form-group">
            <label for="comentarios">Comentarios</label>
            <textarea name="comentarios" class="form-control" id="comentarios">{{ $cotizacion->comentarios }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div>
@endsection
