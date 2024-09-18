<?php

namespace Database\Factories;

use App\Models\Movimento;
use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimentoFactory extends Factory
{
    protected $model = Movimento::class;

    public function definition()
    {
        return [
            'vezes_utilizado' => $this->faker->numberBetween(0, 100),
            'poder' => $this->faker->numberBetween(40, 120),
            'precisao' => $this->faker->numberBetween(70, 100),
            'categoria' => $this->faker->randomElement(['Físico', 'Especial', 'Status']),
            'efeito' => $this->faker->sentence,
            'id_tipo' => Tipo::factory(),
        ];
    }
}
