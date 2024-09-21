<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compra;
use App\Models\Item;
use App\Models\CompraItem;

class CompraItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalCompraItem = 5;

        for ($i = 0; $i <= $totalCompraItem; $i++) {
            $compraId = Compra::pluck('id')->random();
            $itemId = Item::pluck('id')->random();

            // Verifica se o par já existe
            $exists = CompraItem::where('id_compra', $compraId)
                                ->where('id_item', $itemId)
                                ->exists();

            if (!$exists) {
                CompraItem::create([
                    'id_compra' => $compraId,  // Use o mesmo ID gerado
                    'id_item' => $itemId,      // Use o mesmo ID gerado
                    'quantidade' => random_int(1, 10),  // Valor maior que 0 para quantidade
                ]);
            }
        }
    }
}
