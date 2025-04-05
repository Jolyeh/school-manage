<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParcourMaitre extends Model
{
    //
    protected $fillable = [
        "id",
        "annee_scolaire_id",
        "classe_id",
        "maitre_id",
    ];

    public function anneeScolaire(){
        return $this->belongsTo(AnneeScolaire::class);

    }

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function maitre(){
        return $this->belongsTo(Maitre::class);
    }
}
