<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panel\LicenceController;
use App\Http\Controllers\panel\SettingController;
use App\Http\Controllers\panel\AuthAdminController;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\panel\UtilisateurController;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['admin'])->group(function () {

    Route::post('logout', [AuthAdminController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs');
    Route::get('paremetre', [SettingController::class, 'index'])->name('paremetre');
    Route::get('create-licence', [LicenceController::class, 'create'])->name('licence.create');
    Route::post('store_licence', [LicenceController::class, 'store'])->name('licence.store');
// });
// SettingController

// Route de connexion (accessible sans authentification)
Route::get('me_connecter', [AuthAdminController::class, 'create'])->name('login');
Route::post('post_me_connecter', [AuthAdminController::class, 'authenticate'])->name('authenticate');
