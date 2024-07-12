@extends('layouts.app')

@section('content')
    <h1>Crear Cotización</h1>
    <form action="{{ route('cotizaciones.store') }}" method="POST">
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
            <label>Fecha de Cotización:</label>
            <input type="date" name="fecha_cot" class="form-control">
        </div>
        <div>
            <label>Vigencia:</label>
            <input type="date" name="vigencia" class="form-control">
        </div>
        <div>
            <label>Comentarios:</label>
            <textarea name="comentarios" class="form-control"></textarea>
        </div>
        <div>
            <h3>Productos</h3>
            <div id="productos">
                <div class="producto">
                    <select name="productos[0][id_producto]" class="form-control">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="productos[0][cantidad]" placeholder="Cantidad" class="form-control">
                    <input type="number" name="productos[0][precio]" placeholder="Precio" class="form-control">
                </div>
            </div>
            <button type="button" id="addProduct" class="btn btn-secondary">Agregar Producto</button>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('cotizaciones.index') }}" class="btn btn-dark">Volver</a>
    </form>

    <script>
        let productIndex = 1;
        document.getElementById('addProduct').addEventListener('click', function() {
            let productosDiv = document.getElementById('productos');
            let newProductDiv = document.createElement('div');
            newProductDiv.classList.add('producto');
            newProductDiv.innerHTML = `
                <select name="productos[${productIndex}][id_producto]" class="form-control">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
                <input type="number" name="productos[${productIndex}][cantidad]" placeholder="Cantidad" class="form-control">
                <input type="number" name="productos[${productIndex}][precio]" placeholder="Precio" class="form-control">
            `;
            productosDiv.appendChild(newProductDiv);
            productIndex++;
        });
    </script>
@endsection

