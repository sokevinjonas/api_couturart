<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\FonctionnaliteController;
use App\Http\Controllers\SynchronisationController;
use App\Http\Controllers\AuthentificationController;

Route::prefix('v1')->group(function() {
    Route::post('/auth/login', [AuthentificationController::class, 'login']);
    Route::post('/register', [AuthentificationController::class, 'register']);
});

// Routes protégées (nécessitent une authentification avec Sanctum)
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {

    Route::post('/sync/fetch', [SynchronisationController::class, 'fetch']);
    Route::post('fonctionnalites/update', [FonctionnaliteController::class, 'update']);
    Route::post('fonctionnalites/sendSms', [FonctionnaliteController::class, 'sendSms']);
    
    // Route pour la synchronisation
    Route::post('sync/store', [SynchronisationController::class, 'store']);
    Route::post('sync/update', [SynchronisationController::class, 'update']);
    Route::post('sync/destroy', [SynchronisationController::class, 'destroy']);

});