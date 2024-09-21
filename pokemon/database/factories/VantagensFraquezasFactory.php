<?php

namespace Database\Factories;

use App\Models\VantagensFraquezas;
use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VantagensFraquezasFactory extends Factory
{
    protected $model = VantagensFraquezas::class;

    public function definition()
    {
        return [
            'id_tipo_ref' => Tipo::pluck('id')->random(),
            'id_tipo_fraco' => Tipo::pluck('id')->random(),
        ];
    }
}

