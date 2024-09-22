<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use App\Models\PokemonCapturado;
use Illuminate\Support\Facades\DB;

class MeusPokemonsController extends Controller {
    public function index(){
        $idTreinadorLogado = auth()->guard('player')->user()->codigo_treinador;
        $pokemons = DB::table('pokemon')
            ->leftJoin('pokemon_capturado', 'pokemon.id', '=', 'pokemon_capturado.id_pokemon')
            ->leftJoin('pokemon_selvagem', 'pokemon.id', '=', 'pokemon_selvagem.id_pokemon')
            ->select('pokemon.*', 'pokemon_capturado.data')
            ->where('pokemon_capturado.id_treinador', '=', $idTreinadorLogado)
            ->get();

        return view('pokemon.meuspokemons')
                    ->with('pokemons', $pokemons);
    }
}