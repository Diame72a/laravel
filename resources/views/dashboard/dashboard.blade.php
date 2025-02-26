@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Total Machines</h2>
        <p class="text-3xl">{{ $totalMachines }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Total Packages</h2>
        <p class="text-3xl">{{ $totalPackages }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Total Reservations</h2>
        <p class="text-3xl">{{ $totalReservations }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Active Reservations</h2>
        <p class="text-3xl">{{ $activeReservations }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Cancelled Reservations</h2>
        <p class="text-3xl">{{ $cancelledReservations }}</p>
    </div>
</div>
@endsection