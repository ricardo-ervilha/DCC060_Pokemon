<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treinador extends Model
{
    protected $table = 'treinador';
    public $timestamps = false;
    protected $primaryKey = 'codigo_treinador';

    protected $fillable = [
        'nome',
        'frase_especial',
        'foto',
        'id_localidade',
    ];
}
