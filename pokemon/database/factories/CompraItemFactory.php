<?php

namespace Database\Factories;

use App\Models\CompraItem;
use App\Models\Compra;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraItemFactory extends Factory
{
    protected $model = CompraItem::class;

    public function definition()
    {
        return [
            'id_compra' => Compra::factory(),
            'id_item' => Item::factory(),
            'quantidade' => $this->faker->numberBetween(1, 10),
        ];
    }
}

