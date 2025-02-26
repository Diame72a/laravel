<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;



Route::resource('machines', MachineController::class);
Route::resource('packages', PackageController::class);
Route::resource('reservations', ReservationController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');