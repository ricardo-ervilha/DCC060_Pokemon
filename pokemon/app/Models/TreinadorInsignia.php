<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinadorInsignia extends Model
{
    protected $table = 'treinador_insignia';
    use HasFactory;
    public $timestamps = false;

    public function getKeyName()
    {
        return ['codigo_treinador', 'nome_insignia']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false; 
}
