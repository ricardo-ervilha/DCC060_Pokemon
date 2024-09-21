<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VantagensFraquezas extends Model
{
    protected $table = 'vantagens_fraquezas';
    public $timestamps = false;

    public function getKeyName()
    {
        return ['id_tipo_ref', 'id_tipo_fraco']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false; 
}
