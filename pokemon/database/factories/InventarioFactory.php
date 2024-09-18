<?php

namespace Database\Factories;

use App\Models\Inventario;
use App\Models\Jogador;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventarioFactory extends Factory
{
    protected $model = Inventario::class;

    public function definition()
    {
        return [
            'id_jogador' => Jogador::factory(),
            'id_item' => Item::factory(),
            'qtd_atual' => $this->faker->numberBetween(0, 99),
            'qtd_max' => 99,
        ];
    }
}

