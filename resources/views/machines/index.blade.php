@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Liste des Machines</h1>
    <a href="{{ route('machines.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une Machine</a>
    
    <table class="min-w-full bg-white border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">Nom</th>
                <th class="py-2 px-4 border">Processeur</th>
                <th class="py-2 px-4 border">Mémoire</th>
                <th class="py-2 px-4 border">OS</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
                <tr class="text-center">
                    <td class="py-2 px-4 border">{{ $machine->name }}</td>
                    <td class="py-2 px-4 border">{{ $machine->processor }}</td>
                    <td class="py-2 px-4 border">{{ $machine->memory }}</td>
                    <td class="py-2 px-4 border">{{ $machine->os }}</td>
                    <td class="py-2 px-4 border flex justify-center space-x-2">
                        <a href="{{ route('machines.show', $machine) }}" class="bg-green-500 text-white px-3 py-1 rounded">Voir</a>
                        <a href="{{ route('machines.edit', $machine) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Modifier</a>
                        <form action="{{ route('machines.destroy', $machine) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
