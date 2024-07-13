
@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
<div class="container">
<br>
    <h1>Editar Proveedor</h1>
    <form action="{{ route('proveedores.update', $proveedores->id_proveedor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $proveedores->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="nombre_contacto">Nombre de Contacto</label>
            <input type="text" name="nombre_contacto" class="form-control" id="nombre_contacto" value="{{ $proveedores->nombre_contacto }}">
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" id="correo" value="{{ $proveedores->correo }}">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" class="form-control" id="telefono" value="{{ $proveedores->telefono }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div>
@endsection
