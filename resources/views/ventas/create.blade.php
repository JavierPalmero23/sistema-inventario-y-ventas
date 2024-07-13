
@extends('layouts.app')

@section('title', 'Crear Venta')

@section('content')
<div class="container">
<br>
    <h1>Crear Venta</h1>
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_vendedor">Vendedor</label>
            <select name="id_vendedor" class="form-control" id="id_vendedor" required>
                @foreach($vendedores as $vendedor)
                <option value="{{ $vendedor->id_vendedor }}">{{ $vendedor->nombre }}</option>
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
            <label for="id_cat">Categoría</label>
            <select name="id_cat" class="form-control" id="id_cat" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id_cat }}">{{ $categoria->nombre }}</option>
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
            <label for="id_pago">Forma de Pago</label>
            <select name="id_pago" class="form-control" id="id_pago" required>
                @foreach($formasPago as $formaPago)
                <option value="{{ $formaPago->id_pago }}">{{ $formaPago->tipo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_venta">Fecha de Venta</label>
            <input type="date" name="fecha_venta" class="form-control" id="fecha_venta" required max="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="cambio">Cambio</label>
            <input type="number" name="cambio" class="form-control" id="cambio" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="subtotal">Subtotal</label>
            <input type="number" name="subtotal" class="form-control" id="subtotal" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="iva">IVA</label>
            <input type="number" name="iva" class="form-control" id="iva" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" class="form-control" id="total" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
@endsection
