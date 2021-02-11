<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $fillable =['Nom','Prenoms','Sexe','id_poste','id_cabinet','Adresse','Telephone','Pays'];
    public function cabinet()
    {
        return $this->belongsTo(cabinet::class,'id'); 
    }
    public function user()
    {
        return $this->hasOne(User::class,'id'); 
    }
    public function postes()
    {
        return $this->hasMany(Poste::class,'id'); 
    }
    use HasFactory;
}
