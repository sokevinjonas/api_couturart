<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\panel\UtilisateurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs');
