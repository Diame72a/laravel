@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Créer un utilisateur</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Mot de passe</label>
            <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Rôle</label>
            <select name="role" class="w-full px-4 py-2 border rounded-lg" required>
                <option value="user">Utilisateur</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Créer</button>
    </form>
</div>
@endsection