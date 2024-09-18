<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    use HasFactory;
    public $timestamps = false;

    public function getKeyName()
    {
        return ['id_jogador', 'id_item']; // Substitua pelos nomes das colunas da chave primária composta
    }

    public $incrementing = false;  // Define que a chave primária não é auto-incrementada
}
