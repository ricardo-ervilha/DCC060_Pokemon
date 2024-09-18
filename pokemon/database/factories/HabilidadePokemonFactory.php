<?php

namespace Database\Factories;

use App\Models\HabilidadePokemon;
use App\Models\Habilidade;
use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabilidadePokemonFactory extends Factory
{
    protected $model = HabilidadePokemon::class;

    public function definition()
    {
        return [
            'id_habilidade' => Habilidade::factory(),
            'id_pokemon' => Pokemon::factory(),
        ];
    }
}

