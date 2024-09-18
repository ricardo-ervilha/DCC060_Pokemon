<?php

namespace Database\Factories;

use App\Models\Pokemon;
use App\Models\Habilidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonFactory extends Factory
{
    protected $model = Pokemon::class;

    public function definition()
    {
        $hp = $this->faker->numberBetween(50, 100);
        $ataque = $this->faker->numberBetween(50, 100);
        $defesa = $this->faker->numberBetween(50, 100);
        $ataque_especial = $this->faker->numberBetween(50, 100);
        $defesa_especial = $this->faker->numberBetween(50, 100);
        $velocidade = $this->faker->numberBetween(50, 100);

        return [
            'nome' => $this->faker->firstName,
            'hp' => $hp,
            'ataque' => $ataque,
            'defesa' => $defesa,
            'ataque_especial' => $ataque_especial,
            'defesa_especial' => $defesa_especial,
            'velocidade' => $velocidade,
            'total' => $hp + $ataque + $defesa + $ataque_especial + $defesa_especial + $velocidade,
            'sprite' => $this->faker->imageUrl(),
            'geracao' => $this->faker->numberBetween(1, 8),
            'derrotado_batalha' => $this->faker->boolean,
            'id_habilidade' => Habilidade::factory(),
        ];
    }
}