<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraItem extends Model
{
    protected $table = 'compra_item';
    use HasFactory;
    public $timestamps = false;

    public function getKeyName()
    {
        return ['id_compra', 'id_item']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false;  // Define que a chave primária não é auto-incrementada
}
