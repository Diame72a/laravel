<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 p-5 transition-all duration-300">
            <h1 class="text-2xl font-bold text-gray-700 mb-8">Admin</h1>
            
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-200 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 12h18M3 6h18M3 18h18"></path>
                    </svg>
                    <span>Tableau de bord</span>
                </a>
                
                @if(Auth::check() && Auth::user()->role == 'admin')
                <a href="" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-200 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM4 20c0-4.97 4.03-9 9-9s9 4.03 9 9"></path>
                    </svg>
                    <span>Utilisateurs</span>
                </a>
                @endif

                <a href="{{ route('machines') }}" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-200 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM4 20c0-4.97 4.03-9 9-9s9 4.03 9 9"></path>
                    </svg>
                    <span>Machines</span>
                </a>

                <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-200 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM4 20c0-4.97 4.03-9 9-9s9 4.03 9 9"></path>
                    </svg>
                    <span>Ajouter un fichier</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-200 transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"></path>
                        </svg>
                        <span>Se déconnecter</span>
                    </button>
                </form>
            </nav>
        </div>

        <!-- Contenu principal -->
        <div class="flex-1 flex flex-col">
            
            <!-- Navbar -->
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-700">Tableau de bord</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Bienvenue, {{ Auth::user()->name }}</span>
                    <img class="w-10 h-10 rounded-full border" src="https://i.pravatar.cc/100" alt="User Avatar">
                </div>
            </header>

            <!-- Contenu -->
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
