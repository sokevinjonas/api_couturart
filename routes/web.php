<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panel\LicenceController;
use App\Http\Controllers\panel\SettingController;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\panel\UtilisateurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs');
Route::get('paremetre', [SettingController::class, 'index'])->name('paremetre');
Route::get('create-licence', [LicenceController::class, 'create'])->name('licence.create');
// SettingController
