<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    protected $fillable=['Adresse','Telephone','Libelle','Email','pays'];
    public function postuler()
    {
        return $this->hasMany(Postuler::class,'id'); 
    }
    public function postes()
    {
        return $this->hasMany(Poste::class,'id'); 
    }
    use HasFactory;
}
