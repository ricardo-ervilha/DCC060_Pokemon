<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MestreGinasio;
use App\Models\Treinador;
use App\Models\Localidade;
use Faker\Factory as Faker;

class MestreGinasioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();  // Cria uma instância do Faker

        $numPlayers = 10;

        for ($i = 0; $i < $numPlayers; $i++) {
            // Cria um novo Treinador
            $treinador = Treinador::create([
                'nome' => $faker->name,
                'frase_especial' => $faker->sentence,
                'foto' => $faker->imageUrl(640, 480, 'people', true),  // Gera uma imagem aleatória
                'id_localidade' => Localidade::pluck('id')->random(),
            ]);

            MestreGinasio::create([
                'honra' => random_int(0, 10),
                'dificuldade' => random_int(0, 10),
                'especialidade' => array_rand(['Fogo', 'Água', 'Vento', 'Raio', 'Veneno']),
                'nome_ginasio' => $faker->sentence,
                'foto_ginasio' => $faker->sentence,
                'capacidade_ginasio' => random_int(5000, 10000),
                'descricao_ginasio' => $faker->text,
                'horario_funcionamento_ginasio' => "5 às 8",
                'codigo_treinador' => $treinador->codigo_treinador,
            ]);
        }
    }
}
