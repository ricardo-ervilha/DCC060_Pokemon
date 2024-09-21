<?php

namespace App\Http\Controllers;
use App\Models\PokemonCapturado;
use App\Models\PokemonSelvagem;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $idTreinadorLogado = auth()->guard('player')->user()->codigo_treinador;

        $exists = PokemonCapturado::where('id_treinador', '=', $idTreinadorLogado)
                                    ->exists();

        $pokemonsSelvagens = DB::table('pokemon_selvagem')
                                ->join('pokemon', 'pokemon_selvagem.id_pokemon', '=', 'pokemon.id')
                                ->select('pokemon.nome')
                                ->get();

        // se exists é false, então não tem pokémon. Logo, é pra ficar sem hidden na view
        // se exists é true, então tem pokémon. Logo, é pra ficar com hidden na view
        return view('dashboard')->with('hidden', $exists)->with('pokemons', $pokemonsSelvagens);
    }
}
