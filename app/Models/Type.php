<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable=['Libelle','Description'];
    public function tdrs(){
        return $this->hasMany(tdr::class,'id_type'); 
    }
    use HasFactory;
}
