<!-- resources/views/proveedores/create.blade.php -->

@extends('layouts.app')

@section('title', 'Crear Proveedor')

@section('content')
    <div class="container">
        <h1>Crear Proveedor</h1>
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="nombre_contacto">Nombre de Contacto</label>
                <input type="text" name="nombre_contacto" class="form-control" id="nombre_contacto">
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" id="correo">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" class="form-control" id="telefono">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
