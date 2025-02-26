@extends('layouts.default')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Réserver un forfait</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($packages as $package)
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-2">{{ $package->name }}</h2>
            <p class="mb-2">Heures: {{ $package->duration_hours }}</p>
            <p class="mb-4">Prix: {{ $package->price }} €</p>
            <form action="{{ route('reserver.reservePackage') }}" method="POST">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-300">Nom</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-white" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-white" required>
                </div>
                <div class="mb-4">
                    <label for="machine_id" class="block text-sm font-medium text-gray-300">Machine</label>
                    <select id="machine_id" name="machine_id" class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-white" required>
                        @foreach($machines as $machine)
                        <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="start_time" class="block text-sm font-medium text-gray-300">Date et heure de début</label>
                    <input type="datetime-local" id="start_time" name="start_time" class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-white" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-yellow-500 text-gray-900 px-4 py-2 rounded hover:bg-yellow-600">Réserver</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection