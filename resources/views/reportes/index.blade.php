@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1>Generar Reporte</h1>

    <form action="{{ route('reportes.generar') }}" method="GET">
        @csrf
        <div class="mb-4">
            <label for="tipo_reporte">Tipo de Reporte:</label>
            <select id="tipo_reporte" name="tipo_reporte" class="form-control">
                <option value="ventas" {{ old('tipo_reporte') == 'ventas' ? 'selected' : '' }}>Ventas</option>
                <option value="compras" {{ old('tipo_reporte') == 'compras' ? 'selected' : '' }}>Compras</option>
            </select>
            @error('tipo_reporte')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="desde">Desde:</label>
            <input type="date" id="desde" name="desde" value="{{ old('desde') }}" max="{{ date('Y-m-d') }}" class="form-control">
        </div>

        <div class="mb-4">
            <label for="hasta">Hasta:</label>
            <input type="date" id="hasta" name="hasta" value="{{ old('hasta') }}" max="{{ date('Y-m-d') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-info">Generar Reporte</button>
    </form>

    @isset($data)
        <h2 class="mt-8 mb-4">Reporte de {{ ucfirst($tipo_reporte) }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    @if($tipo_reporte == 'ventas')
                        <th>Cliente</th>
                    @else
                        <th>Proveedor</th>
                    @endif
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                        @if($tipo_reporte == 'ventas')
                            {{ $item->fecha_venta }}
                        @else
                            {{ $item->fecha_compra }}
                        @endif</td>
                        @if($tipo_reporte == 'ventas')
                            <td>{{ $item->cliente->nombre }}</td>
                        @else
                            <td>{{ $item->proveedor->nombre }}</td>
                        @endif
                        <td>
                        @if($tipo_reporte == 'ventas')
                            ${{ $item->total }}
                        @else
                            ${{ $item->pc*$item->cantidad }}
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('reportes.generar.pdf') }}" method="POST">
            @csrf
            <input type="hidden" name="tipo_reporte" value="{{ $tipo_reporte }}">
            <input type="hidden" name="desde" value="{{ $desde }}">
            <input type="hidden" name="hasta" value="{{ $hasta }}">
            <button type="submit" class="btn btn-secondary">Descargar PDF</button>
        </form>
    @endisset
    <br>
</div>
@endsection
