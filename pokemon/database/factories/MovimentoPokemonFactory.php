<?php

namespace Database\Factories;

use App\Models\MovimentoPokemon;
use App\Models\Pokemon;
use App\Models\Movimento;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimentoPokemonFactory extends Factory
{
    protected $model = MovimentoPokemon::class;

    public function definition()
    {
        return [
            'id_pokemon' => Pokemon::factory(),
            'id_movimento' => Movimento::factory(),
        ];
    }
}

