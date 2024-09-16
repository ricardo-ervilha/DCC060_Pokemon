<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MestreGinasio extends Model
{
    protected $table = 'mestre_ginasio';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'codigo_treinador';

}
