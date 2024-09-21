<?php

namespace Database\Factories;

use App\Models\MestreGinasio;
use App\Models\Treinador;
use Illuminate\Database\Eloquent\Factories\Factory;

class MestreGinasioFactory extends Factory
{
    protected $model = MestreGinasio::class;

    public function definition()
    {
        return [
            'honra' => $this->faker->numberBetween(1, 100),
            'dificuldade' => $this->faker->numberBetween(1, 10),
            'especialidade' => $this->faker->word,
            'nome_ginasio' => $this->faker->company,
            'foto_ginasio' => $this->faker->imageUrl(),
            'capacidade_ginasio' => $this->faker->numberBetween(50, 500),
            'descricao_ginasio' => $this->faker->paragraph,
            'horario_funcionamento_ginasio' => $this->faker->time('H:i'),
            'codigo_treinador' => Treinador::pluck('codigo_treinador')->random(),
        ];
    }
}