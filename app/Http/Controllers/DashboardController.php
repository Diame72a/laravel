<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Package;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMachines = Machine::count();
        $totalPackages = Package::count();
        $totalReservations = Reservation::count();
        $activeReservations = Reservation::where('status', 'active')->count();
        $cancelledReservations = Reservation::where('status', 'cancelled')->count();

        return view('dashboard.dashboard', compact('totalMachines', 'totalPackages', 'totalReservations', 'activeReservations', 'cancelledReservations'));
    }
}