<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcour extends Model
{
    //
    protected $fillable = [
        "id",
        "eleve_id",
        "classe_id",
        "annee_scolaire_id",
    ];

    public function eleve(){
        return $this->belongsTo(Eleve::class);

    }

    public function classe(){
        return $this->belongsTo(Classe::class);
    }


    public function anneeScolaire(){
        return $this->belongsTo(AnneeScolaire::class, "annee_scolaire_id");

    }
}
