<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'POS System Register')</title>

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

        .register-container {
            background: #FFFFFF;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }

        .register-container h1 {
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
        }

        .register-container .form-group {
            margin-bottom: 1rem;
        }

        .register-container .form-group label {
            display: block;
            font-weight: 600;
        }

        .register-container .form-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .register-container .form-group .form-check-label {
            margin-left: 0.5rem;
        }

        .register-container .form-group .form-check-input {
            margin-right: 0.5rem;
        }

        .register-container .form-group .text-danger {
            color: #dc3545;
        }

        .register-container .btn-primary {
            width: 100%;
            padding: 0.75rem;
            background: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }

        .register-container .btn-primary:hover {
            background: #0056b3;
        }

        .register-container .form-links {
            margin-top: 1rem;
            text-align: center;
        }

        .register-container .form-links a {
            color: #007bff;
            text-decoration: none;
        }

        .register-container .form-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h1>Register</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required>
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

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn-primary ms-4">
                    {{ __('Registrar') }}
                </button>
                <a href="{{ route('login') }}" class="form-links">
                    {{ __('Inicia Sesion!') }}
                </a>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
