<?php 

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store()
    {
        Package::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'duration_hours' => request('duration_hours'),
        ]);

        return redirect()->route('packages.index');
    }

    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Package $package)
    {
        $package->update([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'duration_hours' => request('duration_hours'),
        ]);

        return redirect()->route('packages.index');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index');
    }
}
