<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return app(DashboardController::class)->index();
        }
        return redirect('/')->withErrors(['error' => 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.']);
    })->name('dashboard');

    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => function ($request, $next) {
            if (Auth::check() && Auth::user()->role === 'admin') {
                return $next($request);
            }
            return redirect('/')->withErrors(['error' => 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.']);
        }], function () {
            Route::resource('machines', MachineController::class);
            Route::resource('packages', PackageController::class);
            Route::resource('reservations', ReservationController::class);
            Route::resource('users', UserController::class);
        });
    });

    Route::get('/reserver', [ReservationController::class, 'showPackages'])->name('reserver.showPackages');
    Route::post('/reserver', [ReservationController::class, 'reservePackage'])->name('reserver.reservePackage');
});

Route::get('/', function () {
    return view('main');
});