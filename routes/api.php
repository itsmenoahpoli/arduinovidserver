<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VideosController;


Route::prefix('v1')->group(function () {
    // Auth APIs
    Route::prefix('auth')->group(function () {
        Route::post('signin', [AuthController::class, 'signin'])->name('api.auth.signin');
        Route::post('signup', [AuthController::class, 'signup'])->name('api.auth.signup');
        Route::post('signout', [AuthController::class, 'signout'])->name('api.auth.signout');
    });

    // Videos APIs
    Route::apiResource('admin/videos', VideosController::class);
    Route::apiResource('videos', VideosController::class);
});
