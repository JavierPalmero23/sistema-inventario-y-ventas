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
            <input type="date" name="fecha_venta" class="form-control" max="{{ date('Y-m-d') }}">
        </div>
        <div>
            <label>Productos:</label>
            <div id="productos-container">
                <div class="producto">
                    <select name="productos[0][id]" class="form-control">
                        @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="productos[0][cantidad]" class="form-control" placeholder="Cantidad">
                    <input type="number" name="productos[0][precio]" class="form-control" placeholder="Precio">
                </div>
            </div>
            <button type="button" onclick="addProducto()" class="btn btn-secondary">Add Producto</button>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <script>
        let productoIndex = 1;

        function addProducto() {
            const container = document.getElementById('productos-container');
            const newProducto = document.createElement('div');
            newProducto.classList.add('producto');
            newProducto.innerHTML = `
                <select name="productos[${productoIndex}][id]" class="form-control">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
                <input type="number" name="productos[${productoIndex}][cantidad]" class="form-control" placeholder="Cantidad">
                <input type="number" name="productos[${productoIndex}][precio]" class="form-control" placeholder="Precio">
            `;
            container.appendChild(newProducto);
            productoIndex++;
        }
    </script>
    <br>
</div>
@endsection