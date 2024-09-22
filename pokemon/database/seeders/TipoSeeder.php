<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalTipos = 19;

        for($i = 1; $i <= $totalTipos; $i++){
            $lastTipo = Tipo::latest('id')->first();
            if($lastTipo){
                $url = 'https://pokeapi.co/api/v2/type/' . $lastTipo->id + 1; //URL
            }else{
                $url = 'https://pokeapi.co/api/v2/type/' . '1';
            }

            $response = Http::get($url);

            $data = $response->json();

            Tipo::create([
                'nome_tipo' => $data["name"],
                'cor' => $data["name"] . ".svg",
            ]);
        }
    }
}
