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

        $pokemons_e_tipos = DB::table('pokemon_tipo')
        ->join('tipo', 'pokemon_tipo.id_tipo', '=', 'tipo.id')
        ->join('pokemon', 'pokemon.id', '=', 'pokemon_tipo.id_pokemon')
        ->select('pokemon.id', DB::raw('STRING_AGG(tipo.nome_tipo, \', \' ORDER BY tipo.nome_tipo) as tipos'))
        ->groupBy('pokemon.id')
        ->get();

        return view('pokemon.meuspokemons')
                    ->with('pokemons', $pokemons)
                    ->with('pokemons_e_tipos', $pokemons_e_tipos);
    }
}