<?php

namespace Database\Factories;

use App\Models\PokemonTipo;
use App\Models\Pokemon;
use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonTipoFactory extends Factory
{
    protected $model = PokemonTipo::class;

    public function definition()
    {
        return [
            'id_pokemon' => Pokemon::factory(),
            'id_tipo' => Tipo::factory(),
        ];
    }
}

