<?php

namespace Database\Seeders;

use App\Models\Localidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalLocations = 20;
        $tipos_locais = ['Cidade', 'Floresta', 'Montanha', 'Deserto'];

        for($i = 1; $i <= $totalLocations; $i++){
            $lastLocalidade = Localidade::latest('id')->first();
            if($lastLocalidade){
                $url = 'https://pokeapi.co/api/v2/location/' . $lastLocalidade->id + 1; //URL
            }else{
                $url = 'https://pokeapi.co/api/v2/location/' . '1';
            }

            $response = Http::get($url);

            $data = $response->json();

            Localidade::create([
                'regiao' => $data["name"],
                'local' => $data["region"]["name"],
                'tipo_do_local' => $tipos_locais[array_rand($tipos_locais)],
            ]);
        }
    }
}
