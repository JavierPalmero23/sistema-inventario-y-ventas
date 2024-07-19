@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
<div class="container">
    <br>
    <h1>Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $cliente->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" id="correo" value="{{ $cliente->correo }}">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="number" name="telefono" class="form-control" id="telefono" value="{{ $cliente->telefono }}">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" value="{{ $cliente->direccion }}">
        </div>
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" name="rfc" class="form-control" id="rfc" value="{{ $cliente->rfc }}">
        </div>
        <div class="form-group">
            <label for="razon_social">Razón Social</label>
            <input type="text" name="razon_social" class="form-control" id="razon_social" value="{{ $cliente->razon_social }}">
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control" id="codigo_postal" value="{{ $cliente->codigo_postal }}">
        </div>
        <div class="form-group">
            <label for="regimen_fiscal">Regimen Fiscal</label>
            <select name="regimen_fiscal" id="regimen_fiscal" class="form-control">
                <option value="Actividad Empresarial" {{ $cliente->regimen_fiscal == 'Actividad Empresarial' ? 'selected' : '' }}>Actividad Empresarial</option>
                <option value="Arrendamiento" {{ $cliente->regimen_fiscal == 'Arrendamiento' ? 'selected' : '' }}>Arrendamiento</option>
                <option value="Asalariado" {{ $cliente->regimen_fiscal == 'Asalariado' ? 'selected' : '' }}>Asalariado</option>
                <option value="Intereses" {{ $cliente->regimen_fiscal == 'Intereses' ? 'selected' : '' }}>Intereses</option>
                <option value="Servicios Profesionales" {{ $cliente->regimen_fiscal == 'Servicios Profesionales' ? 'selected' : '' }}>Servicios Profesionales</option>
                <option value="Sin Fines Licrativos" {{ $cliente->regimen_fiscal == 'Sin Fines Licrativos' ? 'selected' : '' }}>Sin Fines Licrativos</option>
                <option value="Incorporacion Fiscal" {{ $cliente->regimen_fiscal == 'Incorporacion Fiscal' ? 'selected' : '' }}>Incorporacion Fiscal</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div>
@endsection