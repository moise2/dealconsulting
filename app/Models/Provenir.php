<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provenir extends Model
{
    protected $provenir=['id_postuler','id_cabinet'];
    use HasFactory;
}
