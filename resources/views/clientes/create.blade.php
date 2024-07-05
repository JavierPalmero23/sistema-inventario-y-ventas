<!-- resources/views/clientes/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Cliente')

@section('content')
    <div class="container">
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
                <input type="text" name="regimen_fiscal" class="form-control" id="regimen_fiscal">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
