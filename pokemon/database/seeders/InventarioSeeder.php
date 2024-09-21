<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventario;
use App\Models\Jogador;
use App\Models\Item;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalInventario = 5;

        for ($i = 0; $i <= $totalInventario; $i++) {
            $jogadorId = Jogador::pluck('codigo_treinador')->random();
            $itemId = Item::pluck('id')->random();

            // Verifica se o par já existe
            $exists = Inventario::where('id_jogador', $jogadorId)
                                ->where('id_item', $itemId)
                                ->exists();

            if (!$exists) {
                Inventario::create([
                    'id_jogador' => $jogadorId,  // Use o mesmo ID gerado
                    'id_item' => $itemId,        // Use o mesmo ID gerado
                    'qtd_atual' => random_int(1, 99),  // Evita quantidade 0
                ]);
            }
        }
    }
}