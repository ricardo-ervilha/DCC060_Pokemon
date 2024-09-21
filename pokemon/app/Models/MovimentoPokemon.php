<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoPokemon extends Model
{
    protected $table = 'movimento_pokemon';
    public $timestamps = false;

    public function getKeyName()
    {
        return ['id_pokemon', 'id_movimento']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false; 
}
