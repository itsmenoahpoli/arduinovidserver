<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VideosController;


Route::prefix('v1')->group(function () {
    // Auth APIs
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'signin']);
    });

    // Videos APIs
    Route::apiResource('videos', VideosController::class);
});
