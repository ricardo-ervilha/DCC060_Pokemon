<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use App\Models\PokemonCapturado;
use App\Models\Treinador;
use App\Models\TimePokemon;


class PokemonCapturadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalPokemonsCapturados = 10;
        $start = strtotime("2000-01-01"); // Data de início
        $end = strtotime("2024-12-31");   // Data de fim

        for($i = 1; $i <= $totalPokemonsCapturados; $i++){
            PokemonCapturado::create(
                [
                    'data' => date("Y-m-d", mt_rand($start, $end)),
                    'id_treinador' => Treinador::pluck('codigo_treinador')->random(),
                    'id_time' => TimePokemon::pluck('id')->random(),
                    'id_pokemon' => $i
                ]
            );
        }
    }
}
