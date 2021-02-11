<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tdr extends Model
{
    protected $fillable=['id_bailleur','id_type','id_responsable','id_client','Nbr_expert','Date_limite','Heure','N_reception','Description','Titre'];
    public function type()
    {
        return $this->belongsTo(Type::class,'id'); 
    }
    public function responsable()
    {
        return $this->hasOne(Responsable::class,'id'); 
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'id'); 
    }
    
    public function bailleur()
    {
        return $this->belongsTo(bailleur::class,'id'); 
    }
    public function postes()
    {
        return $this->hasMany(Poste::class,'id'); 
    }
    public function postulers()
    {
        return $this->hasMany(Postuler::class,'id_tdr'); 
    }
    
    use HasFactory;
}
