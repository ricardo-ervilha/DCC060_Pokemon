<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index(){
        $pokemons = Pokemon::all();

        return view('pokemon.index')
                    ->with('pokemons', $pokemons);
    }

    public function show(){
        return view('pokemon.details');
    }

    public function initial_pokemons(Request $request){
        $pokemons = $request->input('pokemons');

        return response()->json(['success' => true]);
    }
}
