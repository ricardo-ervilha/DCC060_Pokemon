<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\PokemonCapturado;
use App\Models\PokemonSelvagem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PokemonController extends Controller
{
    public function search(Request $request){

        $pokemons = DB::table('pokemon')
            ->leftJoin('pokemon_capturado', 'pokemon.id', '=', 'pokemon_capturado.id_pokemon')
            ->leftJoin('pokemon_selvagem', 'pokemon.id', '=', 'pokemon_selvagem.id_pokemon')
            ->select('pokemon.*', 'pokemon_capturado.data')
            ->where('pokemon.nome', '=', $request->input('pokemon_name'))
            ->get();

        return view('pokemon.index')
             ->with('pokemons', $pokemons);
    }

    public function index(){
        $pokemons = DB::table('pokemon')
            ->leftJoin('pokemon_capturado', 'pokemon.id', '=', 'pokemon_capturado.id_pokemon')
            ->leftJoin('pokemon_selvagem', 'pokemon.id', '=', 'pokemon_selvagem.id_pokemon')
            ->select('pokemon.*', 'pokemon_capturado.data')
            ->get();

        return view('pokemon.index')
                    ->with('pokemons', $pokemons);
    }

    public function show(Request $request, String $pokemon){
        $pokemon_selecionado = DB::table('pokemon')
            ->leftJoin('pokemon_capturado', 'pokemon.id', '=', 'pokemon_capturado.id_pokemon')
            ->leftJoin('pokemon_selvagem', 'pokemon.id', '=', 'pokemon_selvagem.id_pokemon')
            ->select('pokemon.*', 'pokemon_capturado.data')
            ->where('pokemon.id', '=', $pokemon)
            ->first();

        return view('pokemon.details')->with('pokemon', $pokemon_selecionado);
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
                'data' => Carbon::today()
            ]);

            DB::table('pokemon_selvagem')
                ->where('id_pokemon', $pokemonSelvagem->id_pokemon)
                ->delete();

            }
        return redirect()->route('dashboard');
    }
}
