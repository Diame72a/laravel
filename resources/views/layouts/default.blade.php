<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberGames</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold">CyberGames</a>
            <ul class="flex space-x-4">
                <li><a href="{{ url('/') }}" class="hover:text-yellow-500">Accueil</a></li>
                <li><a href="{{ url('/reserver') }}" class="hover:text-yellow-500">Réserver un forfait</a></li>
                @guest
                    <li><a href="{{ route('login') }}" class="hover:text-yellow-500">Connexion</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-yellow-500">Inscription</a></li>
                @else
                    @if(Auth::user()->role === 'admin')
                        <li><a href="{{ route('dashboard') }}" class="hover:text-yellow-500">Dashboard</a></li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:text-yellow-500">Déconnexion</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>