<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insignia extends Model
{
    protected $table = 'insignia';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'nome';
    public $incrementing = false;
}
