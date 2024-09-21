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
        $this->call([
            LocalidadeSeeder::class,
            HabilidadeSeeder::class,
            PokemonSeeder::class,
            JogadorSeeder::class,
            MestreGinasioSeeder::class,
        ]);

        \App\Models\Tipo::factory(10)->create();
        \App\Models\Item::factory(10)->create();
        \App\Models\Movimento::factory(10)->create();
        
        $this->call([
            MovimentoPokemonSeeder::class,
            PokemonTipoSeeder::class,
        ]);
        
        \App\Models\Insignia::factory(5)->create();
        \App\Models\CentroPokemon::factory(5)->create();

        $this->call([
            VantagensFraquezasSeeder::class,
        ]);

        \App\Models\TimePokemon::factory(5)->create();

        $this->call([
            PokemonCapturadoSeeder::class,
            PokemonSelvagemSeeder::class,
            InventarioSeeder::class,
            CompraSeeder::class,
            CompraItemSeeder::class,
        ]);

        \App\Models\PokemonBatalhaTreinador::factory(10)->create();
        \App\Models\TreinadorBatalhaTreinador::factory(10)->create();
        
        $this->call([
            TreinadorInsigniaSeeder::class,
        ]);
    }
}
