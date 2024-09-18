<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treinador extends Model
{
    protected $table = 'treinador';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'codigo_treinador';
}
