<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ClaseController;
use App\Models\Clase;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\EntrenadorController;




Route::get('/', HomeController::class)->name('home');
Route::get('/form', [FormController::class, 'showForm'])->name('form');


Route::get('/register', [FormController::class, 'showForm'])->name('register');
Route::post('/register', [FormController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/clientes', ClienteController::class)->names('admin.clientes');
    Route::put('admin/clientes/{cliente}', [ClienteController::class, 'update'])->name('admin.clientes.update');

    Route::resource('admin/entrenadores', EntrenadorController::class)->names('admin.entrenadores');

    Route::resource('admin/clases', ClaseController::class)->names('admin.clases');


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
