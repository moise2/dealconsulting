<?php

namespace App\Http\Controllers;

use App\Models\Bailleur;
use App\Models\Pays;
use Illuminate\Http\Request;

class BailleurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Pays::all();
        $bailleurs=Bailleur::all();
        return view('pages.bailleur',[
            'countries'=>$countries,
            'bailleurs'=>$bailleurs,
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
        $client = Bailleur::all();
        $verifLibell = Bailleur::where('Libelle',$request->Libelle)->first();
        if ($verifLibell != null) {
            Toastr()->error($request->Libelle.'existe déjà!');
            return redirect()->route('bailleur.index');
        }
        $verifemail = Bailleur::where('Email',$request->Email)->first();
        if ($verifemail != null) {
            Toastr()->error($request->Email.' existe déjà!');
            return redirect()->route('bailleur.index');
        }
        $bailleur = new Bailleur();
           $bailleur->Libelle = $request->Libelle;
           $bailleur->Pays = $request->Pays;
           $bailleur->Libelle = $request->Libelle;
           $bailleur->Email = $request->Email;
           $bailleur->Telephone = $request->Telephone;
           $bailleur->Adresse = $request->Adresse;
           $bailleur->save();
           Toastr()->success($request->Libelle.' a été enregistré avec succès');
           return redirect()->route('bailleur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bailleur  $bailleur
     * @return \Illuminate\Http\Response
     */
    public function show(Bailleur $bailleur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bailleur  $bailleur
     * @return \Illuminate\Http\Response
     */
    public function edit(Bailleur $bailleur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bailleur  $bailleur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bailleur=Bailleur::find($id);
        $bailleur->Libelle = $request->Libelle;
        $bailleur->Pays = $request->Pays;
        $bailleur->Libelle = $request->Libelle;
        $bailleur->Email = $request->Email;
        $bailleur->Telephone = $request->Telephone;
        $bailleur->Adresse = $request->Adresse;
        $bailleur->save();
        Toastr()->success($request->Libelle.' a été enregistré avec succès');
        return redirect()->route('bailleur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bailleur  $bailleur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bailleur $bailleur)
    {
        //
    }
}
