@extends('layouts.app')

@section('title', 'Registrar Compra')

@section('content')
<div class="container">
    <h1>Registrar Compra</h1>

    <form action="{{ route('compras.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_proveedor">Proveedor</label>
            <select name="id_proveedor" id="id_proveedor" class="form-control" required>
                @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div id="productos-container">
            <div class="producto-item">
                <h4>Producto 1</h4>
                <div class="form-group">
                    <label for="producto_1">Producto</label>
                    <select name="productos[0][id_producto]" id="producto_1" class="form-control" required>
                        @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad_1">Cantidad</label>
                    <input type="number" name="productos[0][cantidad]" id="cantidad_1" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="pc_1">Precio de Compra</label>
                    <input type="number" name="productos[0][pc]" id="pc_1" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="pv_1">Precio de Venta</label>
                    <input type="number" name="productos[0][pv]" id="pv_1" class="form-control" required>
                </div>
            </div>
        </div>

        <button type="button" id="add-product" class="btn btn-secondary">Agregar Otro Producto</button>

        <div class="form-group">
            <label for="fecha_compra">Fecha de Compra</label>
            <input type="date" name="fecha_compra" id="fecha_compra" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descuento">Descuento</label>
            <input type="number" name="descuento" id="descuento" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Compra</button>
    </form>
</div>

<script>
    let productoIndex = 1;

    document.getElementById('add-product').addEventListener('click', function() {
        productoIndex++;
        const container = document.getElementById('productos-container');
        const newProduct = document.createElement('div');
        newProduct.classList.add('producto-item');
        newProduct.innerHTML = `
            <h4>Producto ${productoIndex}</h4>
            <div class="form-group">
                <label for="producto_${productoIndex}">Producto</label>
                <select name="productos[${productoIndex}][id_producto]" id="producto_${productoIndex}" class="form-control" required>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad_${productoIndex}">Cantidad</label>
                <input type="number" name="productos[${productoIndex}][cantidad]" id="cantidad_${productoIndex}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pc_${productoIndex}">Precio de Compra</label>
                <input type="number" name="productos[${productoIndex}][pc]" id="pc_${productoIndex}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pv_${productoIndex}">Precio de Venta</label>
                <input type="number" name="productos[${productoIndex}][pv]" id="pv_${productoIndex}" class="form-control" required>
            </div>`;
        container.appendChild(newProduct);
    });
</script>
@endsection