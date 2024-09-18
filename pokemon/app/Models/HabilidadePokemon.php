<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabilidadePokemon extends Model
{
    protected $table = 'habilidade_pokemon';
    use HasFactory;
    public $timestamps = false;
    
    public function getKeyName()
    {
        return ['id_habilidade', 'id_pokemon']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false;  // Define que a chave primária não é auto-incrementada

}
