@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Modifier le Package</h1>
    <form action="{{ route('packages.update', $package->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $package->name }}" class="border p-2 w-full">
        <textarea name="description" class="border p-2 w-full">{{ $package->description }}</textarea>
        <input type="number" name="price" value="{{ $package->price }}" class="border p-2 w-full">
        <input type="number" name="duration_hours" value="{{ $package->duration_hours }}" class="border p-2 w-full">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection
