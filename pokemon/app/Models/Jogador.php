<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Jogador extends Authenticatable
{
    protected $table = 'jogador';
    use HasApiTokens;
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
