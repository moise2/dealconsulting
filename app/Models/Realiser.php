<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realiser extends Model
{
    protected $fillable=['id_postuler','id_expert'];
    use HasFactory;
}
