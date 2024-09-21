<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PokemonTipo;
use App\Models\Tipo;
use App\Models\Pokemon;

class PokemonTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalPokemonTipo = 5;

        for ($i = 0; $i <= $totalPokemonTipo; $i++) {
            $pokemonId = Pokemon::pluck('id')->random();
            $tipoId = Tipo::pluck('id')->random();

            // Verifica se o par já existe
            $exists = PokemonTipo::where('id_pokemon', $pokemonId)
                                ->where('id_tipo', $tipoId)
                                ->exists();

            if (!$exists) {
                PokemonTipo::create([
                    'id_pokemon' => $pokemonId,  // Use o mesmo ID gerado
                    'id_tipo' => $tipoId,        // Use o mesmo ID gerado
                ]);
            }
        }
    }
}

