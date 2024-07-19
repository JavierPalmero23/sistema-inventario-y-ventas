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
    </style>
        </div>
        <div class="wrapper">
        <nav class="sidebar">
            <h2 class="text-center">POS System</h2>
            <a href="{{ route('categorias.index') }}">Categorías</a>
            <a href="{{ route('clientes.index') }}">Clientes</a>
            <a href="{{ route('compras.index') }}">Compras</a>
            <a href="{{ route('cotizaciones.index') }}">Cotizaciones</a>
            <a href="{{ route('formas-pago.index') }}">Formas de Pago</a>
            <a href="{{ route('inventarios.index') }}">Inventarios</a>
            <a href="{{ route('productos.index') }}">Productos</a>
            <a href="{{ route('proveedores.index') }}">Proveedores</a>
            <a href="{{ route('vendedores.index') }}">Vendedores</a>
            <a href="{{ route('ventas.index') }}">Ventas</a>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
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
