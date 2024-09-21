<?php

namespace Database\Seeders;


use App\Models\Habilidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class HabilidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try{
            $totalAbilities = 50;
            
            for ($i = 1; $i <= $totalAbilities; $i++) {

                $lastAbility = Habilidade::latest('id')->first();
                if($lastAbility){
                    $url = 'https://pokeapi.co/api/v2/ability/' . $lastAbility->id + 1; //URL
                }else{
                    $url = 'https://pokeapi.co/api/v2/ability/' . '1';
                }

                $response = Http::get($url);

                $data = $response->json();

                Habilidade::create([
                    'nome' => $data["name"],
                    'efeito' => $data["effect_entries"][0]["effect"],
                ]);
            }

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();
            throw $e;
        }
    }
}
