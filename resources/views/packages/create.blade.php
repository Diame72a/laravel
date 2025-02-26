@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter un Package</h1>
    <form action="{{ route('packages.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Nom du package" class="border p-2 w-full">
        <textarea name="description" placeholder="Description" class="border p-2 w-full"></textarea>
        <input type="number" name="price" placeholder="Prix" class="border p-2 w-full">
        <input type="number" name="duration_hours" placeholder="Durée en heures" class="border p-2 w-full">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</div>
@endsection
