<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    protected $fillable =['Libelle','Montant','Fichier','Date_tranche','id_postuler','Description'];
    public function postulers()
    {
        return $this->hasMany(Postuler::class,'id'); 
    }
    use HasFactory;
}
