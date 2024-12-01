<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Style personnalisé -->
    <style>
        body {
            background-image: url('build/assets/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .top-right {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .welcome-text {
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @if (Route::has('login'))
        <div class="top-right">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="welcome-text">
        Bienvenue Chez Orange  Cyberdefense 
    </div>

    <!-- Inclure les fichiers JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
