<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable=['countryCode','countryname','currencyCode','fipsCode','isoNumeric','north','south','east','west','capital','continentName','continent','languages','isoAlpha3','geonameId'];
    use HasFactory;
}
