<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Localidade;
use App\Models\PokemonSelvagem;

class PokemonSelvagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fimPokemonsSelvagens = 20;

        for($i = 11; $i <= $fimPokemonsSelvagens; $i++){
            PokemonSelvagem::create(
                [
                    'localidade' => Localidade::pluck('id')->random(),
                    'id_pokemon' => $i
                ]
            );
        }
    }
}
