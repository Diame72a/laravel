@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Réservations</h1>

    <a href="{{ route('reservations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nouvelle réservation</a>

    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Utilisateur</th>
                <th class="border p-2">Machine</th>
                <th class="border p-2">Package</th>
                <th class="border p-2">Début</th>
                <th class="border p-2">Fin</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td class="border p-2">{{ $reservation->user->name }}</td>
                <td class="border p-2">{{ $reservation->machine->name }}</td>
                <td class="border p-2">{{ $reservation->package->name }}</td>
                <td class="border p-2">{{ $reservation->start_time }}</td>
                <td class="border p-2">{{ $reservation->end_time }}</td>
                <td class="border p-2">
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="inline">
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
