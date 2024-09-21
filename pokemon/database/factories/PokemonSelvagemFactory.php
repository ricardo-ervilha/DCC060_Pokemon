<?php

namespace Database\Factories;

use App\Models\PokemonSelvagem;
use App\Models\Localidade;
use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonSelvagemFactory extends Factory
{
    protected $model = PokemonSelvagem::class;

    public function definition()
    {
        return [
            'localidade' => Localidade::pluck('id')->random(),
            'id_pokemon' => Pokemon::pluck('id')->random(),
        ];
    }
}
