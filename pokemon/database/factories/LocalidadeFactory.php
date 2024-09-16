<?php

namespace Database\Factories;

use App\Models\Localidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Localidade>
 */
class LocalidadeFactory extends Factory
{   
    protected $model = Localidade::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'regiao' => $this->faker->state,
            'local' => $this->faker->city,
            'tipo_do_local' => $this->faker->randomElement(['Cidade', 'Floresta', 'Montanha', 'Deserto']),
        ];
    }
}
