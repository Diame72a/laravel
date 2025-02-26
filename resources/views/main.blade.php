@extends('layouts.default')

@section('content')
<div class="text-center">
    <h1 class="text-4xl font-bold mb-4">Bienvenue chez CyberGames</h1>
    <p class="text-lg mb-8">Votre destination ultime pour les jeux en ligne et les forfaits de cyber café.</p>
    <a href="{{ url('/reserver') }}" class="bg-yellow-500 text-gray-900 px-4 py-2 rounded hover:bg-yellow-600">Réserver un forfait</a>
</div>
@endsection