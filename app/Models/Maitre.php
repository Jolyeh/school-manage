<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maitre extends Model
{
    //
    protected $fillable = [
        "id",
        "nom",
        "prenoms",
        "telephone",
        "salaire",
    ];
}
