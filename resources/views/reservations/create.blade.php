@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center mb-6">Nouvelle Réservation</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-2 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="machine_id" class="block text-gray-700 font-medium">Machine</label>
            <select name="machine_id" id="machine_id" class="border rounded-lg p-2 w-full shadow-sm focus:ring focus:ring-blue-200">
                @foreach($machines as $machine)
                    <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="package_id" class="block text-gray-700 font-medium">Forfait</label>
            <select name="package_id" id="package_id" class="border rounded-lg p-2 w-full shadow-sm focus:ring focus:ring-blue-200">
                @foreach($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="start_time" class="block text-gray-700 font-medium">Date de début</label>
            <input type="datetime-local" name="start_time" id="start_time" class="border rounded-lg p-2 w-full shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="end_time" class="block text-gray-700 font-medium">Date de fin</label>
            <input type="datetime-local" name="end_time" id="end_time" class="border rounded-lg p-2 w-full shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="status" class="block text-gray-700 font-medium">Statut</label>
            <select name="status" id="status" class="border rounded-lg p-2 w-full shadow-sm focus:ring focus:ring-blue-200">
                <option value="active">Active</option>
                <option value="cancelled">Annulée</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg w-full shadow-md transition">
            Réserver
        </button>
    </form>
</div>
@endsection
