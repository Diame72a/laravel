<!DOCTYPE html>
<html lang="fr">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    
    {{-- CDN Tailwind CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-gray-50">
    {{-- Contenu principal --}}
    <div class="flex-1 p-8">
        @yield('content')
    </div>



</body>
</html>
