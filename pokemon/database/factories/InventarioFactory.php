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
            'id_jogador' => Jogador::pluck('codigo_treinador')->random(),
            'id_item' => Item::pluck('id')->random(),
            'qtd_atual' => $this->faker->numberBetween(0, 99),
            'qtd_max' => 99,
        ];
    }
}

