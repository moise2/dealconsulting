<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experts=Expert::all();
        $countries=Pays::all();
        return view('Pages.expert',[
            "experts"=>$experts,
            "countries"=>$countries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expert = Expert::all();
        $verifLibell = Expert::where('Nom',$request->Libelle)->where('Prenoms',$request->Libelle)->first();
        if ($verifLibell != null) {
            toastr()->error($request->Prenoms.'existe déjà!');
            return redirect()->route('expert.index');
        }
        $verifemail = Expert::where('Email',$request->Email)->first();
        if ($verifemail != null) {
            toastr()->error($request->Email.' existe déjà!');
            return redirect()->route('expert.index');
        }
        if(!Storage::exists('/public_path/files')) {

            Storage::makeDirectory('/public_path/files/cv', 0775, true); //creates directory
        }
        $expert = new Expert();
        if ($request->file('Cv') != null) {
            $fichier = $request->file('Cv');
            $cv = $request->Nom.''.$request->Prenoms.'.'.$fichier->getClientOriginalExtension();
            $fichier->move(public_path("files/cv"), $cv);
            $expert->Cv = $cv;
        }
           $expert->Nom = $request->Nom;
           $expert->Prenoms = $request->Prenoms;
           $expert->Sexe = $request->Sexe;
           $expert->Email = $request->Email;
           $expert->Telephone = $request->Telephone;
           $expert->Adresse = $request->Adresse;
           $expert->Profile = $request->Profile;
           $expert->Anneexperiance = $request->Anneexperiance;
           $expert->Pays = $request->Pays;
           $expert->save();
           toastr()->success($request->Prénoms .' '.$request->Nom.' a été enregistré avec succès');
           return redirect()->route('expert.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function show(Expert $expert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function edit(Expert $expert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expert $expert)
    {
        $expert=Expert::find($expert->id);
        if(file_exists(public_path().'/files/cv/'.$expert->Cv)){
            unlink(public_path().'/files/cv/'.$expert->Cv);
        }
        if(!Storage::exists('/public_path/files/cv')) {

            Storage::makeDirectory('/public_path/files/cv', 0775, true); //creates directory
        }
        if ($request->file('Cv') != null) {
            $Cv = $request->file('Cv');
            $photo_new_name = $request->Libelle.'.'.$Cv->getClientOriginalExtension();
            $Cv->move(public_path("images"), $photo_new_name);
            $expert->Cv =  $photo_new_name;

        $expert->Nom = $request->Nom;
        $expert->Prenoms = $request->Prenoms;
        $expert->Sexe = $request->Libelle;
        $expert->Email = $request->Email;
        $expert->Anneexperiance = $request->Anneexperiance;
        $expert->Telephone = $request->Telephone;
        $expert->Adresse = $request->Adresse;
        $expert->Profile = $request->Profile;
        $expert->Pays = $request->Pays;
        $expert->Cv = $request->Cv;
        $expert->save();
        toastr()->success($request->Prénoms .' '.$request->Nom.' a été enregistré avec succès');
        return redirect()->route('expert.index');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expert $expert)
    {
        //
    }
}
