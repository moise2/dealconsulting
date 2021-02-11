<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['Adresse','Telephone','Email','Pays','Libelle'];
    public function tdrs()
    {
        return $this->hasMany(Tdr::class,'id_client'); 
    }
    use HasFactory;
}
