<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    //
    protected $table = "annee_scolaires";
    protected $fillable = [
        "id",
        "annee_deb",
        "annee_fin"
    ];
}
