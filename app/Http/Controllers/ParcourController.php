<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Parcour;
use Illuminate\Http\Request;

class ParcourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $parcours = Parcour::all();
        return view("dashboard.parcour.index", compact("parcours"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $eleves = Eleve::all();
        $class = Classe::all();
        $anneeScolaires = AnneeScolaire::all();
        return view("dashboard.parcour.add", compact("eleves","class","anneeScolaires"));
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
                    "eleve_id"=> "required",
                    "classe_id"=> "required",
                    "annee_scolaire_id"=> "required",
                ],
                [
                    "eleve_id"=> "Veuillez renseigner l'élève",
                    "classe_id"=> "Veuillez renseigner la classe",
                    "annee_scolaire_id"=> "Veuillez renseigner l'année scolaire",
                ]
            );

            Parcour::create($validate);
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
    public function show(Parcour $parcour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcour $parcour, $id)
    {
        //
        $parcour = Parcour::findOrFail($id);
        $eleves = Eleve::all();
        $class = Classe::all();
        $anneeScolaires = AnneeScolaire::all();
        //dd($parcour);
        return view('dashboard.parcour.edit', compact('parcour', "eleves","class","anneeScolaires"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcour $parcour, $id)
    {
        //
        try {
            $validate = $request->validate(
                [
                    "eleve_id"=> "required",
                    "classe_id"=> "required",
                    "annee_scolaire_id"=> "required",
                ],
                [
                    "eleve_id"=> "Veuillez renseigner l'élève",
                    "classe_id"=> "Veuillez renseigner la classe",
                    "annee_scolaire_id"=> "Veuillez renseigner l'année scolaire",
                ]
            );

            $parcour = Parcour::findOrFail($id);
            $parcour->update($validate);

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
    public function destroy(Parcour $parcour, Request $request)
    {
        //
        try {
            $parcour = Parcour::where("id",'=', $request->id)->first();
            $parcour->delete();
            toast('Suppression éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
    }
}
