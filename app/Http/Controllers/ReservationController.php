<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Machine;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        // Récupérer les réservations de l'utilisateur connecté
        $reservations = Reservation::where('user_id', Auth::id())->with(['machine', 'package'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $machines = Machine::all();
        $packages = Package::all();
        return view('reservations.create', compact('machines', 'packages'));

    }

    public function store(Request $request)
    {
        // Vérifier que l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'Vous devez être connecté pour faire une réservation.']);
        }

        // Validation des champs avec les dates
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'package_id' => 'required|exists:packages,id',
            'start_time' => 'required|date|after_or_equal:now',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:active,cancelled',
        ], [
            'start_time.after_or_equal' => 'La date de début ne peut pas être dans le passé.',
            'end_time.after' => 'La date de fin doit être après la date de début.',
        ]);

        // Créer la réservation avec l'utilisateur connecté
        Reservation::create([
            'user_id' => Auth::id(), // Associe automatiquement l'utilisateur connecté
            'machine_id' => $validated['machine_id'],
            'package_id' => $validated['package_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('reservations.index')->with('success', 'Réservation créée avec succès.');
    }

    public function edit(Reservation $reservation)
    {
        // Vérifier si l'utilisateur connecté est le propriétaire de la réservation
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('reservations.index')->withErrors(['error' => 'Vous n\'avez pas l\'autorisation de modifier cette réservation.']);
        }

        $machines = Machine::all();
        $packages = Package::all();
        return view('reservations.edit', compact('reservation', 'machines', 'packages'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        // Vérifier que l'utilisateur est propriétaire de la réservation
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('reservations.index')->withErrors(['error' => 'Vous n\'avez pas l\'autorisation de modifier cette réservation.']);
        }

        // Validation des champs avec les dates
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'package_id' => 'required|exists:packages,id',
            'start_time' => 'required|date|after_or_equal:now',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:active,cancelled',
        ], [
            'start_time.after_or_equal' => 'La date de début ne peut pas être dans le passé.',
            'end_time.after' => 'La date de fin doit être après la date de début.',
        ]);

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        // Vérifier si l'utilisateur connecté est le propriétaire de la réservation
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('reservations.index')->withErrors(['error' => 'Vous n\'avez pas l\'autorisation de supprimer cette réservation.']);
        }

        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }

    public function showPackages()
    {
        $packages = Package::all();
        $machines = Machine::all();
        return view('reserver', compact('packages', 'machines'));
    }

    public function reservePackage(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'package_id' => 'required|exists:packages,id',
            'machine_id' => 'required|exists:machines,id',
            'start_time' => 'required|date|after:now',
        ]);

        // Récupérer le package pour obtenir la durée
        $package = Package::find($request->package_id);
        $start_time = Carbon::parse($request->start_time);
        $end_time = $start_time->copy()->addHours($package->duration_hours);

        // Créer la réservation
        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'package_id' => $request->package_id,
            'machine_id' => $request->machine_id,
            'user_id' => Auth::id(), // Associer la réservation à l'utilisateur connecté
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        return redirect('/')->with('success', 'Votre réservation a été effectuée avec succès!');
    }
}
