<?php

namespace Database\Factories;

use App\Models\TreinadorBatalhaTreinador;
use App\Models\Treinador;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreinadorBatalhaTreinadorFactory extends Factory
{
    protected $model = TreinadorBatalhaTreinador::class;

    public function definition()
    {
        return [
            'codigo_treinador1' => Treinador::pluck('codigo_treinador')->random(),
            'codigo_treinador2' => Treinador::pluck('codigo_treinador')->random(),
            'data' => $this->faker->date(),
            'turnos_durados' => $this->faker->numberBetween(1, 10),
            'qtd_dinheiro_ganho_p1' => $this->faker->randomFloat(2, 50, 500),
            'qtd_dinheiro_ganho_p2' => $this->faker->randomFloat(2, 50, 500),
            'vencedor' => Treinador::pluck('codigo_treinador')->random(),
        ];
    }
}
