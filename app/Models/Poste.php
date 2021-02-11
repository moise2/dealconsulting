<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable=['Libelle','Description'];
    public function responsable()
    {
        return $this->belongsTo(Responsable::class,'id'); 
    }
    use HasFactory;
}
