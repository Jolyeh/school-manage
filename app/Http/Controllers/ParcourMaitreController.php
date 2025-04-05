<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Maitre;
use App\Models\ParcourMaitre;
use Illuminate\Http\Request;

class ParcourMaitreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $parcourMaitres = ParcourMaitre::all();
        //dd($parcourMaitres);
        return view("dashboard.parcour_maitre.index", compact("parcourMaitres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $maitres = Maitre::all();
        $class = Classe::all();
        $anneeScolaires = AnneeScolaire::all();
        return view("dashboard.parcour_maitre.add", compact("maitres","class","anneeScolaires"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $validate = $request->validate(
                [
                    "maitre_id"=> "required",
                    "classe_id"=> "required",
                    "annee_scolaire_id"=> "required",
                ],
                [
                    "maitre_id"=> "Veuillez renseigner le maitre",
                    "classe_id"=> "Veuillez renseigner la classe",
                    "annee_scolaire_id"=> "Veuillez renseigner l'année scolaire",
                ]
            );

            ParcourMaitre::create($validate);
            toast('Enregistrement éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(1000000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ParcourMaitre $parcourMaitre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParcourMaitre $parcourMaitre, $id)
    {
        //
        $maitres = Maitre::all();
        $class = Classe::all();
        $anneeScolaires = AnneeScolaire::all();
        $parcourMaitre = ParcourMaitre::find($id);
        return view("dashboard.parcour_maitre.edit", compact("maitres","class","anneeScolaires", "parcourMaitre"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParcourMaitre $parcourMaitre, $id)
    {
        //
        try {
            $validate = $request->validate(
                [
                    "maitre_id"=> "required",
                    "classe_id"=> "required",
                    "annee_scolaire_id"=> "required",
                ],
                [
                    "maitre_id"=> "Veuillez renseigner le maitre",
                    "classe_id"=> "Veuillez renseigner la classe",
                    "annee_scolaire_id"=> "Veuillez renseigner l'année scolaire",
                ]
            );

            $parcourMaitre = ParcourMaitre::find($id);
            $parcourMaitre->update($validate);
            toast('Modification éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(1000000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParcourMaitre $parcourMaitre, Request $request)
    {
        //
        try {
            $parcourMaitre = ParcourMaitre::where("id",'=', $request->id)->first();
            $parcourMaitre->delete();
            toast('Suppression éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
    }
}
