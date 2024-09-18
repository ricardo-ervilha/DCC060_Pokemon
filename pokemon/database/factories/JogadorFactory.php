<?php

namespace Database\Factories;

use App\Models\Jogador;
use App\Models\Treinador;
use Illuminate\Database\Eloquent\Factories\Factory;

class JogadorFactory extends Factory
{
    protected $model = Jogador::class;

    public function definition()
    {
        return [
            'username' => $this->faker->userName,
            'senha' => $this->faker->password,
            'data_nascimento' => $this->faker->date(),
            'dinheiro' => $this->faker->randomFloat(2, 0, 10000),
            'codigo_treinador' => Treinador::factory(),
        ];
    }
}

