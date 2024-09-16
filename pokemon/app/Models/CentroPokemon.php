<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroPokemon extends Model
{
    protected $table = 'centro_pokemon';
    use HasFactory;
    public $timestamps = false;
}
