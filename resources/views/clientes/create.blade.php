@extends('layouts.app')

@section('title', 'Crear Cliente')

@section('content')
<div class="container">
    <br>
    <h1>Crear Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" id="correo">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" class="form-control" id="telefono">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion">
        </div>
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" name="rfc" class="form-control" id="rfc">
        </div>
        <div class="form-group">
            <label for="razon_social">Razón Social</label>
            <input type="text" name="razon_social" class="form-control" id="razon_social">
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control" id="codigo_postal">
        </div>
        <div class="form-group">
            <label for="regimen_fiscal">Regimen Fiscal</label>
            <select name="regimen_fiscal" id="regimen_fiscal" class="form-control">
                <option value="Actividad Empresarial">Actividad Empresarial</option>
                <option value="Arrendamiento">Arrendamiento</option>
                <option value="Asalariado" selected="selected">Asalariado</option>
                <option value="Intereses">Intereses</option>
                <option value="Servicios Profesionales">Servicios Profesionales</option>
                <option value="Sin Fines Licrativos">Sin Fines Licrativos</option>
                <option value="Incorporacion Fiscal">Incorporacion Fiscal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
@endsection