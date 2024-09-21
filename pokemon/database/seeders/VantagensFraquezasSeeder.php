<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VantagensFraquezas;
use App\Models\Tipo;

class VantagensFraquezasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalVF = 5;
        
        for($i = 0; $i <= $totalVF; $i++){
            $tipo1= Tipo::pluck('id')->random();
            $tipo2 = Tipo::pluck('id')->random();

            // Verifica se o par já existe
            $exists = VantagensFraquezas::where('id_tipo_ref', $tipo1)
                                    ->where('id_tipo_fraco', $tipo2)
                                    ->exists();

            if (!$exists) {
                VantagensFraquezas::create([
                    'id_tipo_ref' => $tipo1,
                    'id_tipo_fraco' => $tipo2,
                ]);
            }
        }
        
    }  
}
