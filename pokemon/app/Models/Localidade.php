<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    protected $table = 'localidade';

    use HasFactory;
    public $timestamps = false;
}
