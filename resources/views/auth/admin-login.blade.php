<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6; /* Light gray background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-card {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-card h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #1a202c;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }
        .form-group input {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
        }
        .form-group input:focus {
            outline: none;
            border-color: #4c51bf; /* Example focus color */
            box-shadow: 0 0 0 3px rgba(76, 81, 191, 0.25);
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .checkbox-group input[type="checkbox"] {
            margin-right: 0.5rem;
            border-color: #cbd5e0;
        }
        .checkbox-group label {
            font-size: 0.875rem;
            color: #4a5568;
            cursor: pointer;
        }
        .submit-btn {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            background-color: #4c51bf; /* Primary button color */
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }
        .submit-btn:hover {
            background-color: #3f45a0; /* Darker on hover */
        }
        .error-message {
            color: #e53e3e; /* Red for errors */
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .alert {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            color: #664d03;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 0.375rem;
        }
        .forgot-password-link {
            text-align: right;
            margin-top: 1rem;
        }
        .forgot-password-link a {
            color: #4c51bf;
            font-size: 0.875rem;
            text-decoration: none;
        }
        .forgot-password-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Admin Login</h2>

        @if (session('status'))
            <div class="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert" style="background-color: #fdd; border-left-color: #e53e3e; color: #b32a2a;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="checkbox-group">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <button type="submit" class="submit-btn">Log in</button>

            @if (Route::has('password.request'))
                <div class="forgot-password-link">
                    <a href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</body>
</html>