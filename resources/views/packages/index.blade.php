@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Liste des Packages</h1>
    <a href="{{ route('packages.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un Package</a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Nom</th>
                <th class="border p-2">Prix</th>
                <th class="border p-2">Durée (heures)</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $package)
            <tr>
                <td class="border p-2">{{ $package->name }}</td>
                <td class="border p-2">{{ $package->price }}€</td>
                <td class="border p-2">{{ $package->duration_hours }}</td>
                <td class="border p-2 flex gap-2">
                    <a href="{{ route('packages.edit', $package->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Éditer</a>
                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
