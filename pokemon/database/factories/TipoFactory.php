<?php

namespace Database\Factories;

use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoFactory extends Factory
{
    protected $model = Tipo::class;

    public function definition()
    {
        return [
            'nome_tipo' => $this->faker->word,
            'cor' => $this->faker->safeColorName,
        ];
    }
}