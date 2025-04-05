<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Parcour;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $eleves = Eleve::all();
        return view("dashboard.eleve.index", compact("eleves"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("dashboard.eleve.add");
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
                    "nom"=> "required",
                    "prenoms"=> "required",
                    "date_naissance"=> "required",
                ],
                [
                    "nom"=> "Veuillez renseigner le nom",
                    "prenoms"=> "Veuillez renseigner le prénom",
                    "date_naissance"=> "Veuillez renseigner la date de naissance",
                ]
            );

            $eleve = Eleve::create($validate);

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
    public function show(Eleve $eleve, $id, Parcour $parcour)
    {
        //
        $data['parcours'] = $parcour->where('eleve_id', $id)->get()->all();
        $data['eleve'] = $eleve->find($id);
        return view('dashboard.eleve.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eleve $eleve, $id)
    {
        //
        $eleve = Eleve::findOrFail($id);
        return view('dashboard.eleve.edit', compact('eleve'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eleve $eleve, $id)
    {
        //
        try {

            $validate = $request->validate(
                [
                    "nom"=> "required",
                    "prenoms"=> "required",
                    "date_naissance"=> "required",
                ],
                [
                    "nom"=> "Veuillez renseigner le nom",
                    "prenoms"=> "Veuillez renseigner le prénom",
                    "date_naissance"=> "Veuillez renseigner la date de naissance",
                ]
            );

            $eleve = Eleve::findOrFail($id);
            $eleve->update($validate);

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
    public function destroy(Eleve $eleve, Request $request)
    {
        //
        try {
            $eleve = Eleve::findOrFail($request->id);
            $eleve->delete();

            toast('Suppression éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
    }
}
