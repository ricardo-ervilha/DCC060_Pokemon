<?php

namespace Database\Factories;

use App\Models\TreinadorInsignia;
use App\Models\Treinador;
use App\Models\Insignia;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreinadorInsigniaFactory extends Factory
{
    protected $model = TreinadorInsignia::class;

    public function definition()
    {
        return [
            'codigo_treinador' => \App\Models\Treinador::pluck('codigo_treinador')->random(),
            'nome_insignia' => $this->getRandomInsigniaName(), // Escolhe um nome existente
            'data' => $this->faker->date(),
        ];
    }

    public function getRandomInsigniaName()
    {
        // Recupera todos os nomes existentes na tabela Insignia
        $names = Insignia::pluck('nome')->toArray(); // Extrai apenas os nomes em um array
        
        // Retorna um nome aleatório da lista
        return $this->faker->randomElement($names);
    }

}
