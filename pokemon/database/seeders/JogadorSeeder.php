<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jogador;
use App\Models\Treinador;
use App\Models\Localidade;
use Faker\Factory as Faker;

class JogadorSeeder extends Seeder
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

            // Cria um novo Jogador
            Jogador::create([
                'username' => $faker->userName,
                'senha' => bcrypt($faker->password),  // Encripta a senha gerada
                'data_nascimento' => $faker->date(),
                'codigo_treinador' => $treinador->codigo_treinador,  // Relaciona com o treinador criado
            ]);
        }
    }
}
