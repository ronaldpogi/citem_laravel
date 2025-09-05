<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OptionsController;
use Illuminate\Support\Facades\Route;

Route::post('/register/step1', [AuthController::class, 'validateStep1']);
Route::post('/register/step2', [AuthController::class, 'validateStep2']);
Route::post('/register/final', [AuthController::class, 'final']);


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('options')->group(function () {
    Route::get('/city', [OptionsController::class, 'getCity']);
    Route::get('/region', [OptionsController::class, 'getRegion']);
    Route::get('/country', [OptionsController::class, 'getCountry']);
    Route::get('/participation', [OptionsController::class, 'getParticipation']);
});
