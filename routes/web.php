<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservaController;
use App\Models\Clase;

Route::get('/', HomeController::class)->name('home');
Route::get('form', FormController::class)->name('form');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Otras rutas de admin
});

Route::middleware('auth:client')->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
    Route::get('/reservar-clases', function () {
        $clases = Clase::all();
        return view('reserva_clases', compact('clases'));
    })->name('reservar.clases');
    Route::post('/cancelar-reserva/{id}', [ReservaController::class, 'cancelarReserva'])->name('cancelar.reserva');
    Route::post('/reservar-clase', [ReservaController::class, 'reservarClase'])->name('reservar.clase');
    Route::post('/client/update', [ClientController::class, 'update'])->name('client.update');
    // Otras rutas de client
});
