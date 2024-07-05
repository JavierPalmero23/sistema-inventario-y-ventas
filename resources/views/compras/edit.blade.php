<!-- resources/views/compras/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Editar Compra')

@section('content')
    <div class="container">
        <h1>Editar Compra</h1>
        <form action="{{ route('compras.update', $compra->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_proveedor">Proveedor</label>
                <select name="id_proveedor" class="form-control" id="id_proveedor" required>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}" {{ $compra->id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_producto">Producto</label>
                <select name="id_producto" class="form-control" id="id_producto" required>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}" {{ $compra->id_producto == $producto->id_producto ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" id="cantidad" value="{{ $compra->cantidad }}" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" id="precio" value="{{ $compra->precio }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_compra">Fecha de Compra</label>
                <input type="date" name="fecha_compra" class="form-control" id="fecha_compra" value="{{ $compra->fecha_compra }}" required>
            </div>
            <div class="form-group">
                <label for="descuento">Descuento</label>
                <input type="number" step="0.01" name="descuento" class="form-control" id="descuento" value="{{ $compra->descuento }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
