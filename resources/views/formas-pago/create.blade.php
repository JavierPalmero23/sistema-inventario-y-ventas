
@extends('layouts.app')

@section('title', 'Crear Forma de Pago')

@section('content')
<div class="container">
<br>
    <h1>Crear Forma de Pago</h1>
    <form action="{{ route('formas-pago.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" class="form-control" id="tipo" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('formas-pago.index') }}" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
@endsection
