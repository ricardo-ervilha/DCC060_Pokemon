<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Localidade::factory(10)->create();
        \App\Models\Habilidade::factory(10)->create();
        \App\Models\Tipo::factory(10)->create();
        \App\Models\Item::factory(10)->create();
        \App\Models\Treinador::factory(10)->create();
        \App\Models\Pokemon::factory(10)->create();
        \App\Models\Movimento::factory(10)->create();
        \App\Models\MestreGinasio::factory(5)->create();
        \App\Models\Insignia::factory(5)->create();
        \App\Models\CentroPokemon::factory(5)->create();
        \App\Models\Jogador::factory(10)->create();
        \App\Models\HabilidadePokemon::factory(20)->create();
        \App\Models\MovimentoPokemon::factory(20)->create();
        \App\Models\VantagensFraquezas::factory(20)->create();
        \App\Models\PokemonTipo::factory(20)->create();
        \App\Models\TimePokemon::factory(5)->create();
        \App\Models\PokemonCapturado::factory(10)->create();
        \App\Models\PokemonSelvagem::factory(10)->create();
        \App\Models\Inventario::factory(10)->create();
        \App\Models\Compra::factory(10)->create();
        \App\Models\CompraItem::factory(20)->create();
        \App\Models\PokemonBatalhaTreinador::factory(10)->create();
        \App\Models\TreinadorBatalhaTreinador::factory(10)->create();
        \App\Models\TreinadorInsignia::factory(10)->create();
    }
}
