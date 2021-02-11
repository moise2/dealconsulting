<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avoirstatut extends Model
{
    protected $fillable=['id_statut','id_postuler','Point','date_postuler'];
    use HasFactory;
}
