<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $class = Classe::all();
        return view("dashboard.classe.index", compact("class"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("dashboard.classe.add");
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
                "libelle"=> "required",
                ],
                [
                    "libelle"=> "Veuillez renseigner le libellé",
                ]
            );

            $classe = Classe::create($validate);
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
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe, $id)
    {
        //
        $classe= Classe::find($id);
        return view('dashboard.classe.edit', compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe)
    {
        //
        try {
            $validate = $request->validate(
                [
                "libelle"=> "required",
                ],
                [
                    "libelle"=> "Veuillez renseigner le libellé",
                ]
            );

            $classe = Classe::where("id", $request->id);
            $classe->update($validate);

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
    public function destroy(Classe $classe, Request $request)
    {
        //
        try {
            $classe = Classe::where("id", $request->id);
            $classe->delete();

            toast('Suppression éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
    }
}
