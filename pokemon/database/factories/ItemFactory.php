<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'categoria' => $this->faker->randomElement(['Cura', 'Status', 'Batalha']),
            'efeito' => $this->faker->sentence,
            'preco' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}