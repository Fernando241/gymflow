<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\UserController;


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

/* Membership Routes*/
Route::resource('membresias', MembresiaController::class);
Route::post('/membresia/{user}/renovar', [MembresiaController::class, 'renovar'])->name('membresias.renovar');

/* ruta para gestionar usuario */
Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{user}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
});