@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1>Create Venta</h1>
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div>
            <label>Cliente:</label>
            <select name="id_cliente" class="form-control">
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Fecha Venta:</label>
            <input type="date" name="fecha_venta" class="form-control" max="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" required>
        </div>
        <div>
            <label>Productos:</label>
            <div id="productos-container">
                <div class="producto">
                    <select name="productos[0][id_producto]" class="form-control" onchange="updatePrecio(this)">
                        <option value="" disabled selected>Seleccione un producto</option>
                        @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}" data-precio="{{ $producto->pv }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="productos[0][cantidad]" class="form-control" placeholder="Cantidad" min="0" required>
                    <input type="number" name="productos[0][precio]" class="form-control" placeholder="Precio" readonly>
                </div>
            </div>
            <button type="button" onclick="addProducto()" class="btn btn-secondary">Agregar Producto</button>
        </div>
        <br>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Vender</button>
    </form>

    <script>
        let productoIndex = 1;

        function addProducto() {
            const container = document.getElementById('productos-container');
            const newProducto = document.createElement('div');
            newProducto.classList.add('producto');
            newProducto.innerHTML = `
                <select name="productos[${productoIndex}][id_producto]" class="form-control" onchange="updatePrecio(this)">
                    <option value="" disabled selected>Seleccione un producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}" data-precio="{{ $producto->pv }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
                <input type="number" name="productos[${productoIndex}][cantidad]" class="form-control" placeholder="Cantidad" min="0" required>
                <input type="number" name="productos[${productoIndex}][precio]" class="form-control" placeholder="Precio" readonly>
            `;
            container.appendChild(newProducto);
            productoIndex++;
        }

        function updatePrecio(select) {
            const precioInput = select.closest('.producto').querySelector('input[name$="[precio]"]');
            const selectedOption = select.options[select.selectedIndex];
            const precio = selectedOption.getAttribute('data-precio');
            precioInput.value = precio;
        }
    </script>
    <br>
</div>
@endsection
