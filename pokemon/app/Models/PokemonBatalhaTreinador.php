<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonBatalhaTreinador extends Model
{
    protected $table = 'pokemon_batalha_treinador';
    use HasFactory;
    public $timestamps = false;

    public function getKeyName()
    {
        return ['id_selvagem', 'id_treinador']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false; 
}
