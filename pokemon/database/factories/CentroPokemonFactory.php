<?php

namespace Database\Factories;

use App\Models\CentroPokemon;
use App\Models\Localidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentroPokemonFactory extends Factory
{
    protected $model = CentroPokemon::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'foto' => $this->faker->imageUrl(),
            'descricao' => $this->faker->paragraph,
            'horario_funcionamento' => $this->faker->time('H:i'),
            'id_localidade' => Localidade::factory(),
        ];
    }
}
