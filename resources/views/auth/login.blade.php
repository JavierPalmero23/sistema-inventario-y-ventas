<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'POS System Login')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #CECECE;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #FFFFFF;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }

        .login-container h1 {
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
        }

        .login-container .form-group {
            margin-bottom: 1rem;
        }

        .login-container .form-group label {
            display: block;
            font-weight: 600;
        }

        .login-container .form-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-container .form-group .form-check-label {
            margin-left: 0.5rem;
        }

        .login-container .form-group .form-check-input {
            margin-right: 0.5rem;
        }

        .login-container .form-group .text-danger {
            color: #dc3545;
        }

        .login-container .btn-primary {
            width: 100%;
            padding: 0.75rem;
            background: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }

        .login-container .btn-primary:hover {
            background: #0056b3;
        }

        .login-container .form-links {
            margin-top: 1rem;
            text-align: center;
        }

        .login-container .form-links a {
            color: #007bff;
            text-decoration: none;
        }

        .login-container .form-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me
            <div class="form-group">
                <div class="form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>
            </div>-->

            <button type="submit" class="btn-primary">Log in</button>

            <div class="form-links">
                <!--@if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                @endif-->
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrate!</a>
                @endif
            </div>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
