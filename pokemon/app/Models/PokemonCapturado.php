<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonCapturado extends Model
{
    
    protected $table = 'pokemon_capturado';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_pokemon';
}
