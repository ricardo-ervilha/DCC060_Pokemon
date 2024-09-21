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
            'id_treinador' => Treinador::pluck('codigo_treinador')->random(),
            'id_time' => TimePokemon::pluck('id')->random(),
            'id_pokemon' => Pokemon::pluck('id')->random(),
        ];
    }
}

