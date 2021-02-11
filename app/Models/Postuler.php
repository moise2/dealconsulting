<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postuler extends Model
{
    protected $fillable=['Proposition_t_f','date_postuler','id_montant','id_tdr','id_cabinet'];
    public function tdr()
    {
        return $this->belongsTo(tdr::class,'id'); 
    }

    use HasFactory;
}
