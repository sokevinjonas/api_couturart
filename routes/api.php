<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\SynchronisationController;
use App\Http\Controllers\AuthentificationController;

Route::post('/auth/login', [AuthentificationController::class, 'login']);
Route::post('/register', [AuthentificationController::class, 'register']);

// Routes protégées (nécessitent une authentification avec Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/sync/fetch', [SynchronisationController::class, 'fetch']);

    // Route pour la synchronisation
    Route::post('sync/store', [SynchronisationController::class, 'store']);
    Route::post('sync/update', [SynchronisationController::class, 'update']);
    Route::post('sync/destroy', [SynchronisationController::class, 'destroy']);

    //souscription
    Route::post('/subscriptions', [AbonnementController::class, 'store']);
    Route::get('/subscriptions/activate', [AbonnementController::class, 'getActiveSubscription']);
});

