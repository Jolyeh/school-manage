<?php

namespace App\Http\Controllers;

use App\Models\Maitre;
use App\Models\ParcourMaitre;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MaitreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $maitres = Maitre::all();
        return view("dashboard.maitre.index", compact("maitres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("dashboard.maitre.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        try{

            $validate = $request->validate(
                [
                    "nom"=>["required","string"],
                    "prenoms"=>["required","string"],
                    "telephone"=>["required","string", "max:10", "unique:maitres,telephone"],
                    "salaire"=> ["required","integer"],
                ],
                [
                    'nom.required' =>'Veuillez renseigner le nom',
                    'prenoms.required' =>'Veuillez renseigner le prenom',
                    'telephone.required' =>'Veuillez renseigner le telephone',
                    'salaire.required' =>'Veuillez renseigner le salaire',
                    'telephone.unique'=> 'Le telephone existe déjà',
                ]
            );

            //$maitre = Maitre::create($validate);
            $maitre = Maitre::create(
                [
                    'nom'=> $validate["nom"],
                    'prenoms'=> $validate["prenoms"],
                    'telephone'=> $validate["telephone"],
                    'salaire'=> $validate["salaire"]
                ]
            );


            //return redirect()->route('dashboard')
            toast('Modification éffectué','success',)->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch(\Exception $e){
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Maitre $maitre, $id)
    {
        //
        //$maitre = Maitre::findOrFail($id);
        $maitre = Maitre::where("id",'=', $id)->first();
        $parcours = ParcourMaitre::where('maitre_id','=', $id)->get()->all();
        //dd($parcours);
        return view('dashboard.maitre.show', compact('maitre', 'parcours'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maitre $maitre, $id)
    {
        //
        $maitre = Maitre::findOrFail($id);
        return view('dashboard.maitre.edit', compact('maitre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maitre $maitre, $id)
    {
        //
        try {
            $validate = $request->validate(
                [
                    "nom"=>["required","string"],
                    "prenoms"=>["required","string"],
                    "telephone"=>["required","string", "max:10"],
                    "salaire"=> ["required","integer"],
                ],
                [
                    'nom.required' =>'Veuillez renseigner le nom',
                    'prenoms.required' =>'Veuillez renseigner le prenom',
                    'telephone.required' =>'Veuillez renseigner le telephone',
                    'salaire.required' =>'Veuillez renseigner le salaire',
                ]
            );

            $maitre = Maitre::where("id",'=', $id)->first();
            $maitre->update($request->all());

            toast('Modification éffectué','success',)->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
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
    public function destroy(Maitre $maitre, Request $request)
    {
        //

        try {
            $maitre = Maitre::where("id",'=', $request->id)->first();
            $maitre->delete();
            toast('Suppression éffectué','success')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toast($e->getMessage(),'error')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#191C24');
            return redirect()->back();
        }

    }
}
