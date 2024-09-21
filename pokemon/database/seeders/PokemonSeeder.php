<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use App\Models\Habilidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfPokemons = 5;

        for ($i = 1; $i <= $numberOfPokemons; $i++) {

            $lastPokemon = Pokemon::latest('id')->first();

            if ($lastPokemon) {
                $url = 'https://pokeapi.co/api/v2/pokemon/' . ($lastPokemon->id + 1);
            } else {
                $url = 'https://pokeapi.co/api/v2/pokemon/1';
            }
            
            $response = Http::get($url);

            $data = $response->json();

            // Verificação para caso a Habilidade esteja ou não dentro do banco (Questão por causa de ter menos habilidades que o total possível...)
            $habilidade = Habilidade::where('nome', '=', $data["abilities"][0]['ability']['name'])->first();

            // Se a habilidade já existe, usa-se seu ID. Aaso contrário, pega um valor aleatório que está dentro da DB
            if ($habilidade) {
                $id = $habilidade->id;
            } else {
                $habilidadeIds = Habilidade::pluck('id');
                $id = $habilidadeIds->random();
            }

            Pokemon::create([
                'nome' => $data["name"],
                'hp' => $data["stats"][0]["base_stat"],
                'ataque' => $data["stats"][1]["base_stat"],
                'defesa' => $data["stats"][2]["base_stat"],
                'ataque_especial' => floor($data["stats"][3]["base_stat"]),
                'defesa_especial' => floor($data["stats"][4]["base_stat"]),
                'velocidade' => $data["stats"][5]["base_stat"],
                'sprite' => $data["sprites"]["other"]["dream_world"]["front_default"],
                'id_habilidade' => $id,
            ]);
            
        }
    }
}
