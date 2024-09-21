<?php

namespace Database\Factories;

use App\Models\TimePokemon;
use App\Models\Treinador;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimePokemonFactory extends Factory
{
    protected $model = TimePokemon::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'id_treinador' => Treinador::pluck('codigo_treinador')->random(),
        ];
    }
}
