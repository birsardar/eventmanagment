<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Managment</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
            /* Light gray background */
        }

        .auth-links {
            text-align: center;
        }

        .auth-links a {
            font-weight: 600;
            color: #4b5563;
            margin: 0 10px;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .auth-links a:hover {
            background-color: #e5e7eb;
            /* Lighter gray on hover */
        }
    </style>
</head>

<body class="antialiased">
    <div class="flex-center">
        @if (Route::has('login'))
            <div class="auth-links">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold">Home</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-semibold">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
