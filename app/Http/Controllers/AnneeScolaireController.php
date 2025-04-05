<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $anneeScolaires = AnneeScolaire::all();
        return view("dashboard.annee_scolaire.index", compact("anneeScolaires"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("dashboard.annee_scolaire.add");
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
                "annee_deb"=> "required",
                "annee_fin"=> "required",
                ],
                [
                    "annee_deb"=> "Veuillez renseigner la date de début",
                    "annee_fin"=> "Veuillez renseigner la date de fin",
                ]
            );

            AnneeScolaire::create($validate);

            toast('Enregistrement éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AnneeScolaire $anneeScolaire, $id)
    {
        //
        $anneeScolaire = AnneeScolaire::where('id', '=',$id)->first();
        return view('dashboard.annee_scolaire.show', compact('anneeScolaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnneeScolaire $anneeScolaire, $id)
    {
        //
        $anneeScolaire = AnneeScolaire::where('id','=',$id)->first();
        return view('dashboard.annee_scolaire.edit', compact('anneeScolaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnneeScolaire $anneeScolaire, $id)
    {
        //
        try {
            $validate = $request->validate(
                [
                "annee_deb"=> "required",
                "annee_fin"=> "required",
                ],
                [
                    "annee_deb"=> "Veuillez renseigner la date de début",
                    "annee_fin"=> "Veuillez renseigner la date de fin",
                ]
            );
            $anneeScolaire = AnneeScolaire::where('id', '=',$id)->first();
            $anneeScolaire->update($request->all());

            toast('Modification éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnneeScolaire $anneeScolaire, Request $request)
    {
        //
        try {
            $anneeScolaire = AnneeScolaire::where('id', '=',$request->id)->first();
            $anneeScolaire->delete();
            toast('Suppression éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }

    }
}
