<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bailleur extends Model
{
    protected $fillable=['Adresse','Telephone','Email','Pays','Libelle'];
    use HasFactory;
}
