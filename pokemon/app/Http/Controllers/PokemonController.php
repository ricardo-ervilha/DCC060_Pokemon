<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\PokemonCapturado;
use App\Models\PokemonSelvagem;
use Illuminate\Support\Facades\DB;

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

        //array contendo os pokémons selecionados na tela inicial
        $pokemons = $request->input('selected_pokemons');
        $array = json_decode($pokemons, true);
        
        //para cada pokémon selvagem, converto em pokémon capturado
        foreach($array as $pokemon_name){
            $pokemonSelvagem = DB::table('pokemon_selvagem')
                             ->join('pokemon', 'pokemon_selvagem.id_pokemon', '=', 'pokemon.id')
                             ->where('nome', '=', $pokemon_name)->first();
            
            PokemonCapturado::create([
                'id_pokemon' => $pokemonSelvagem->id_pokemon,
                'id_treinador' => auth()->guard('player')->user()->codigo_treinador,
            ]);

            DB::table('pokemon_selvagem')
                ->where('id_pokemon', $pokemonSelvagem->id_pokemon)
                ->delete();

            }
        return redirect()->route('dashboard');
    }
}
