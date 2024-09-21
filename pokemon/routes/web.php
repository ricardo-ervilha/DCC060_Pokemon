<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\DashboardController;
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



Route::prefix('pokemon')->middleware(['auth:player'])->group(function() {
    Route::get('/', [PokemonController::class, 'index'])->name('pokemon.index');
    Route::get('/show', [PokemonController::class, 'show'])->name('pokemon.show');
    Route::post('/initial-pokemons', [PokemonController::class, 'initial_pokemons'])->name('pokemon.initial_pokemons');
});

Route::middleware(['auth:player'])->group(function(){
    Route::get('/player/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

Route::middleware('auth:player')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:player')->group(function () {
    Route::get('/teams', [TeamsController::class, 'getTeams'])->name('teams.get');
});

require __DIR__.'/player-auth.php';
