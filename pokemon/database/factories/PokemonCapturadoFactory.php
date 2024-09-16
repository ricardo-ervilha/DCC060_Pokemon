<?php

namespace Database\Factories;

use App\Models\PokemonCapturado;
use App\Models\Treinador;
use App\Models\TimePokemon;
use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonCapturadoFactory extends Factory
{
    protected $model = PokemonCapturado::class;

    public function definition()
    {
        return [
            'data' => $this->faker->date(),
            'id_treinador' => Treinador::factory(),
            'id_time' => TimePokemon::factory(),
            'id_pokemon' => Pokemon::factory(),
        ];
    }
}

