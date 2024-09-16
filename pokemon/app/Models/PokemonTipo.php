<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonTipo extends Model
{
    
    protected $table = 'pokemon_tipo';
    use HasFactory;
    public $timestamps = false;

    public function getKeyName()
    {
        return ['id_pokemon', 'id_tipo']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false; 
}
