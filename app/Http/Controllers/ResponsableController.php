<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Pays;
use App\Models\Poste;
use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Pays::all();
        $responsable=Responsable::all();
        $postes=Poste::all();
        $cabinets=Cabinet::all();
        return view('pages.responsable',[
            'countries'=>$countries,
            'responsables'=>$responsable,
            'postes'=>$postes,
            'cabinets'=>$cabinets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $responsable=Responsable::all();
        return view('Pages.responsable',[
            "responsables"=>$responsable
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reponsable = Responsable::all();
        $verifLibell = Responsable::where('Nom',$request->Libelle)->where('Prenoms',$request->Libelle)->first();
        if ($verifLibell != null) {
            toastr()->error($request->Prenoms.'existe déjà!');
            return redirect()->route('responsable.index');
        }
        $verifemail = Responsable::where('Email',$request->Email)->first();
        if ($verifemail != null) {
            toastr()->error($request->Email.' existe déjà!');
            return redirect()->route('responsable.index');
        }
           $reponsable = new Responsable();
           $reponsable->Nom = $request->Nom;
           $reponsable->Prenoms = $request->Prenoms;
           $reponsable->Sexe = $request->Sexe;
           $reponsable->Email = $request->Email;
           $reponsable->Telephone = $request->Telephone;
           $reponsable->Adresse = $request->Adresse;
           $reponsable->Pays = $request->Pays;
           $reponsable->id_poste = $request->id_poste;
           $reponsable->id_cabinet = $request->id_cabinet;
           $reponsable->save();
           toastr()->success($request->Prénoms .' '.$request->Nom.' a été enregistré avec succès');
           return redirect()->route('responsable.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show(Responsable $responsable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsable $responsable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $reponsable =  Responsable::find($id);
           $reponsable->Nom = $request->Nom;
           $reponsable->Prenoms = $request->Prenoms;
           $reponsable->Sexe = $request->Sexe;
           $reponsable->Email = $request->Email;
           $reponsable->Telephone = $request->Telephone;
           $reponsable->Adresse = $request->Adresse;
           $reponsable->id_poste = $request->id_poste;
           $reponsable->id_cabinet = $request->id_cabinet;
           $reponsable->Pays = $request->Pays;
           $reponsable->save();
           toastr()->success($request->Prénoms .' '.$request->Nom.' a été enregistré avec succès');
           return redirect()->route('responsable.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsable $responsable)
    {
        //
    }
}
