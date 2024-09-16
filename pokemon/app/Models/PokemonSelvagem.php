<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonSelvagem extends Model
{
    
    protected $table = 'pokemon_selvagem';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_pokemon';
}
