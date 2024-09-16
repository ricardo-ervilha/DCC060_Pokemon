<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimePokemon extends Model
{
    
    protected $table = 'time_pokemon';
    use HasFactory;
    public $timestamps = false;
    
}
