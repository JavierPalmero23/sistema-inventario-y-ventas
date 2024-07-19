@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <h1>Hola {{ Auth::user()->name }},</h1>
        <p>Bienvenido al Punto de Venta (POS)</p>
        <p>Desde aquí puedes acceder a todas las funcionalidades necesarias para las ventas del negocio.</p>
        <p>Asegúrate de explorar todas las secciones del sistema en la barra lateral, como las categorías, productos, ventas y más.</p>
        <div class="alert alert-info">
            <strong>Nota:</strong> Revisa regularmente las actualizaciones y mensajes importantes para mantenerte al tanto de las novedades.
        </div>
        <br>
    </div>
@endsection