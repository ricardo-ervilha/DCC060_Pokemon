<?php

namespace Database\Factories;

use App\Models\PokemonBatalhaTreinador;
use App\Models\Pokemon;
use App\Models\Treinador;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonBatalhaTreinadorFactory extends Factory
{
    protected $model = PokemonBatalhaTreinador::class;

    public function definition()
    {
        return [
            'id_selvagem' => Pokemon::factory(),
            'id_treinador' => Treinador::factory(),
            'turnos_durados' => $this->faker->numberBetween(1, 10),
            'qtd_dinheiro_ganho' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
