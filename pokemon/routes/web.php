<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/player/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:player'])->name('dashboard');

Route::prefix('pokemon')->middleware(['auth:player'])->group(function() {
    Route::get('/', [PokemonController::class, 'index'])->name('pokemon.index');
    Route::get('/show', [PokemonController::class, 'show'])->name('pokemon.show');
});

Route::middleware('auth:player')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/player-auth.php';
