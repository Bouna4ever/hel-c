<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    ProfilController
};

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register')->name('auth.register');
    Route::post('/login', 'login')->name('auth.login');
});

// Récupérer tous les profils
Route::prefix('profils')->controller(ProfilController::class)->group(function() {
        // Récupérer tous les profils
        Route::get('/', 'index')->name('profils.index');
        Route::post('/', 'store')->name('profils.store')->middleware('auth:sanctum');
        Route::put('/{profil}', 'update')->name('profils.update')->middleware('auth:sanctum');
        Route::delete('/{profil}', 'destroy')->name('profils.destroy')->middleware('auth:sanctum');
    });
