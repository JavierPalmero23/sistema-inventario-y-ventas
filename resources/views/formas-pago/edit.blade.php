<!-- resources/views/formas-pago/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Editar Forma de Pago')

@section('content')
    <div class="container">
        <h1>Editar Forma de Pago</h1>
        <form action="{{ route('formas-pago.update', $formaPago->id_pago) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" name="tipo" class="form-control" id="tipo" value="{{ $formaPago->tipo }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
