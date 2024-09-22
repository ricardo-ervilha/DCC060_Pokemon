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
        $treinador1 = Treinador::pluck('codigo_treinador')->random();
        $treinador2 = Treinador::pluck('codigo_treinador')->random();
        while($treinador1 == $treinador2){
            $treinador2 = Treinador::pluck('codigo_treinador')->random();
        }

        $treinadores = [$treinador1, $treinador2];

        return [
            'codigo_treinador1' => $treinador1,
            'codigo_treinador2' => $treinador2,
            'data' => $this->faker->date(),
            'turnos_durados' => $this->faker->numberBetween(1, 10),
            'qtd_dinheiro_ganho_p1' => $this->faker->randomFloat(2, 50, 500),
            'qtd_dinheiro_ganho_p2' => $this->faker->randomFloat(2, 50, 500),
            'vencedor' => $treinadores[array_rand($treinadores)],
        ];
    }
}
