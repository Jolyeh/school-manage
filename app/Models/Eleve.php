<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    //
    protected $table = "eleves";

    protected $fillable = [
        "id",
        "nom",
        "prenoms",
        "date_naissance",
    ];
}
