<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $fillable=['Nom','Prenoms','Sexe','Telephone','Adresse','Pays','Profile','Cv','Anneexperiance'];
    public function postuler()
    {
        return $this->hasMany(Postuler::class,'id'); 
    }
    use HasFactory;
}
