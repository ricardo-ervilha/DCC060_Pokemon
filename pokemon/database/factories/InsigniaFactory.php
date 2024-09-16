<?php

namespace Database\Factories;

use App\Models\Insignia;
use App\Models\MestreGinasio;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsigniaFactory extends Factory
{
    protected $model = Insignia::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->unique->name,
            'id_lider' => MestreGinasio::factory(),
            'elemento' => $this->faker->word,
            'icone' => $this->faker->imageUrl(),
        ];
    }
}
