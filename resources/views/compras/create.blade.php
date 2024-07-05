<!-- resources/views/compras/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Compra')

@section('content')
    <div class="container">
        <h1>Crear Compra</h1>
        <form action="{{ route('compras.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_proveedor">Proveedor</label>
                <select name="id_proveedor" class="form-control" id="id_proveedor" required>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_producto">Producto</label>
                <select name="id_producto" class="form-control" id="id_producto" required>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" id="cantidad" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" id="precio" required>
            </div>
            <div class="form-group">
                <label for="fecha_compra">Fecha de Compra</label>
                <input type="date" name="fecha_compra" class="form-control" id="fecha_compra" max="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="descuento">Descuento</label>
                <input type="number" step="0.01" name="descuento" class="form-control" id="descuento">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
