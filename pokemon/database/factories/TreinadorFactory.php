<?php

namespace Database\Factories;

use App\Models\Treinador;
use App\Models\Localidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreinadorFactory extends Factory
{
    protected $model = Treinador::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'frase_especial' => $this->faker->sentence,
            'foto' => $this->faker->imageUrl(),
            'id_localidade' => Localidade::pluck('id')->random(),
        ];
    }
}