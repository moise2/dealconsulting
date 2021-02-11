<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traiter extends Model
{
    protected $fillable=['id_expert','id_postuler'];
    use HasFactory;
}
