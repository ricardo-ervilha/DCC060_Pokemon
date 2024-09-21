<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreinadorInsignia;
use App\Models\Treinador;
use App\Models\Insignia;

class TreinadorInsigniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalTreinadorInsignias = 5;
        $start = strtotime("2000-01-01"); // Data de início
        $end = strtotime("2024-12-31");   // Data de fim

        for ($i = 0; $i <= $totalTreinadorInsignias; $i++) {
            $treinadorId = Treinador::pluck('codigo_treinador')->random();
            $nomeInsignia = Insignia::pluck('nome')->random();

            // Verifica se o par já existe
            $exists = TreinadorInsignia::where('codigo_treinador', $treinadorId)
                                ->where('nome_insignia', $nomeInsignia)
                                ->exists();

            if (!$exists) {
                TreinadorInsignia::create([
                'codigo_treinador' => $treinadorId,
                'nome_insignia' => $nomeInsignia, // Escolhe um nome existente
                'data' => date("Y-m-d", mt_rand($start, $end)),
                ]);
            }
        }
    }
}

