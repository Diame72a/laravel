<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::all();
        return view('machines.index', compact('machines'));
    }

    public function create()
    {
        return view('machines.create');
    }

    public function store()
    {
        Machine::create([
            'name' => request('name'),
            'processor' => request('processor'),
            'memory' => request('memory'),
            'os' => request('os'),
            'games_installed' => request('games_installed'),
            'purchase_date' => request('purchase_date'),
            'last_maintenance' => request('last_maintenance'),
        ]);

        return redirect()->route('machines.index');
    }

    public function show(Machine $machine)
    {
        return view('machines.show', compact('machine'));
    }

    public function edit(Machine $machine)
    {
        return view('machines.edit', compact('machine'));
    }

    public function update(Machine $machine)
    {
        $machine->update([
            'name' => request('name'),
            'processor' => request('processor'),
            'memory' => request('memory'),
            'os' => request('os'),
            'games_installed' => request('games_installed'),
            'purchase_date' => request('purchase_date'),
            'last_maintenance' => request('last_maintenance'),
        ]);

        return redirect()->route('machines.index');
    }

    public function destroy(Machine $machine)
    {
        $machine->delete();
        return redirect()->route('machines.index');
    }
}
