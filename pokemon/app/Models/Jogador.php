<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogador';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'codigo_treinador';

}
