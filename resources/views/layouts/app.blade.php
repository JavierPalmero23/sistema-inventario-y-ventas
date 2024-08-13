<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'POS System')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .wrapper {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: #fff;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            flex: 1;
            padding: 20px;
            background: #CECECE;
        }

        .container {
            background: #FFFFFF;
            border-radius: 25px;

        }
        .chart-row {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .chart-item {
            flex: 1;
            min-width: 300px;
            width: 40%;
            height: 40%;
            margin: auto;
        }
        canvas {
            width: 90% !important;
            height: 100% !important;
        }
        canvas.pastel {
            width: 44% !important;
            height: 50% !important;
        }
    </style>
    </div>
    <div class="wrapper">
        <nav class="sidebar">
            <a href="{{ route('dashboard') }}"><h2 class="text-center">POS System</h2></a>
            <a href="{{ route('categorias.index') }}">
                <img src="{{ asset('images/tags.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Categorías
            </a>
            <a href="{{ route('clientes.index') }}">
                <img src="{{ asset('images/target-audience.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Clientes
            </a>
            <a href="{{ route('compras.index') }}">
                <img src="{{ asset('images/shopping-cart-add.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Compras
            </a>
            <a href="{{ route('cotizaciones.index') }}">
                <img src="{{ asset('images/calculator-money.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Cotizaciones
            </a>
            <a href="{{ route('formas-pago.index') }}">
                <img src="{{ asset('images/credit-card.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Formas de Pago
            </a>
            <a href="{{ route('inventarios.index') }}">
                <img src="{{ asset('images/shelves.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Inventarios
            </a>
            <a href="{{ route('productos.index') }}">
                <img src="{{ asset('images/box-open.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Productos
            </a>
            <a href="{{ route('proveedores.index') }}">
                <img src="{{ asset('images/people-network-partner.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Proveedores
            </a>
            <a href="{{ route('reportes.generar') }}">
                <img src="{{ asset('images/report.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Reportes
            </a>
            <a href="{{ route('vendedores.index') }}">
                <img src="{{ asset('images/seller.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Vendedores
            </a>
            <a href="{{ route('ventas.index') }}">
                <img src="{{ asset('images/ticket.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                Ventas
            </a>
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out ') }}<img src="{{ asset('images/logout.png') }}" style="width: 20px; height: 20px; vertical-align: middle;">
                    </x-responsive-nav-link>
                </form>
            </div>
        </nav>
        <div class="content">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>