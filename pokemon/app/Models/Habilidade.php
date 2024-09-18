<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    protected $table = 'habilidade';
    use HasFactory;
    public $timestamps = false;
}
