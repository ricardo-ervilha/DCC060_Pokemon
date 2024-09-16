<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinadorBatalhaTreinador extends Model
{
    
    protected $table = 'treinador_batalha_treinador';
    use HasFactory;
    public $timestamps = false;

    public function getKeyName()
    {
        return ['codigo_treinador1', 'codigo_treinador2', 'data']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false; 
}
