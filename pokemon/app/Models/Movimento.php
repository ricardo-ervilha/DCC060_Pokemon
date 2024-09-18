<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = 'movimento';
    use HasFactory;
    public $timestamps = false;
}
