<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compra;
use App\Models\Treinador;
use App\Models\CentroPokemon;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalCompra = 5;

        for ($i = 0; $i <= $totalCompra; $i++) {
            $treinadorId = Treinador::pluck('codigo_treinador')->random();
            $cpId = CentroPokemon::pluck('id')->random();

            // Verifica se o par já existe
            $exists = Compra::where('id_treinador', $treinadorId)
                            ->where('id_centro_pokemon', $cpId)
                            ->exists();

            if (!$exists) {
                Compra::create([
                    'total' => random_int(2, 100),
                    'desconto' => random_int(2, 10),
                    'id_treinador' => $treinadorId,  // Use o mesmo ID gerado
                    'id_centro_pokemon' => $cpId,    // Use o mesmo ID gerado
                ]);
            }
        }
    }
}
