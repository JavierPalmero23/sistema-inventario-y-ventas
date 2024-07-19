@extends('layouts.app')

@section('content')
    <h1>Edit Venta</h1>
    <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Cliente:</label>
            <select name="cliente_id" class="form-control">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $venta->cliente_id == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Fecha Venta:</label>
            <input type="date" name="fecha_venta" class="form-control" value="{{ $venta->fecha_venta }}" max="{{ date('Y-m-d') }}">
        </div>
        <div>
            <label>Productos:</label>
            <div id="productos-container">
                @foreach($venta->productos as $key => $producto)
                    <div class="producto">
                        <select name="productos[{{ $key }}][id]" class="form-control">
                            @foreach($productos as $p)
                                <option value="{{ $p->id }}" {{ $producto->pivot->producto_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <input type="number" name="productos[{{ $key }}][cantidad]" class="form-control" placeholder="Cantidad" value="{{ $producto->pivot->cantidad }}">
                        <input type="number" name="productos[{{ $key }}][precio]" class="form-control" placeholder="Precio" value="{{ $producto->pivot->precio }}">
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addProducto()">Add Producto</button>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <script>
        let productoIndex = {{ $venta->productos->count() }};

        function addProducto() {
            const container = document.getElementById('productos-container');
            const newProducto = document.createElement('div');
            newProducto.classList.add('producto');
            newProducto.innerHTML = `
                <select name="productos[${productoIndex}][id]" class="form-control">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
                <input type="number" name="productos[${productoIndex}][cantidad]" class="form-control" placeholder="Cantidad">
                <input type="number" name="productos[${productoIndex}][precio]" class="form-control" placeholder="Precio">
            `;
            container.appendChild(newProducto);
            productoIndex++;
        }
    </script>
@endsection
