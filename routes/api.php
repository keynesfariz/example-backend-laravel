<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', LoginController::class);
    // Route::post('logout');
    // Route::post('refresh-token');
    // Route::post('register');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/user', fn(Request $request) => $request->user());
});
