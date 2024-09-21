<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MovimentoPokemon;
use App\Models\Movimento;
use App\Models\Pokemon;

class MovimentoPokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalMovimentoPokemon = 5;
        
        for($i = 0; $i <= $totalMovimentoPokemon; $i++){
            $pokemonId = Pokemon::pluck('id')->random();
            $movimentoId = Movimento::pluck('id')->random();

            // Verifica se o par já existe
            $exists = MovimentoPokemon::where('id_pokemon', $pokemonId)
                                    ->where('id_movimento', $movimentoId)
                                    ->exists();

            if (!$exists) {
                MovimentoPokemon::create([
                    'id_pokemon' => $pokemonId,
                    'id_movimento' => $movimentoId,
                ]);
            }
        }
        
    }  
}
