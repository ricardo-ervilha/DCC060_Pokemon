<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Jogador extends Authenticatable
{
    protected $table = 'jogador';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'codigo_treinador';

    protected $guard = 'player';

    protected $fillable = [
        'username',
        'senha',
        'data_nascimento',
        'codigo_treinador'
    ];
}
