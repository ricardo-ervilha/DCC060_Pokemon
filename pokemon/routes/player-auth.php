<?php

use App\Http\Controllers\Player\Auth\LoginController;
use App\Http\Controllers\Player\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('player')->middleware('guest:player')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('player')->middleware('auth:player')->group(function () {

    Route::post('logout', [LoginController::class, 'destroy'])
                ->name('logout');
});
