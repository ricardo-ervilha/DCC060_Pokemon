<?php

namespace Database\Factories;

use App\Models\Compra;
use App\Models\Treinador;
use App\Models\CentroPokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    protected $model = Compra::class;

    public function definition()
    {
        return [
            'total' => $this->faker->randomFloat(2, 10, 500),
            'desconto' => $this->faker->randomFloat(2, 0, 30),
            'id_treinador' => Treinador::factory(),
            'id_centro_pokemon' => CentroPokemon::factory(),
        ];
    }
}

