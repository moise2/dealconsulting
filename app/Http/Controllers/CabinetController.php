<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Pays;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabinets=Cabinet::all();
        $countries=Pays::all();
        return view('Pages.cabinet',[
            "countries"=>$countries,
            "cabinets"=>$cabinets,
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
        $babinet = Cabinet::all();
        $verifLibell = Cabinet::where('Libelle',$request->Libelle)->first();
        if ($verifLibell != null) {
            toastr()->error($request->Libelle.'existe déjà!');
            return redirect()->route('cabinet.index');
        }
        $verifemail = Cabinet::where('Email',$request->Email)->first();
        if ($verifemail != null) {
            toastr()->error($request->Libelle.' existe déjà!');
            return redirect()->route('cabinet.index');
        }
        $cabinet = new Cabinet();
           $cabinet->Libelle = $request->Libelle;
           $cabinet->pays = $request->pays;
           $cabinet->Libelle = $request->Libelle;
           $cabinet->Email = $request->Email;
           $cabinet->Telephone = $request->Telephone;
           $cabinet->Adresse = $request->Adresse;
           $cabinet->save();
           toastr()->success($request->Libelle.' a été enregistré avec succès');
           return redirect()->route('cabinet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function show(Cabinet $cabinet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabinet $cabinet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabinet $cabinet)
    {
        $cabinet=Cabinet::find($cabinet->id);
        $cabinet->Libelle = $request->Libelle;
        $cabinet->pays = $request->pays;
        $cabinet->Libelle = $request->Libelle;
        $cabinet->Email = $request->Email;
        $cabinet->Telephone = $request->Telephone;
        $cabinet->Adresse = $request->Adresse;
        $cabinet->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabinet $cabinet)
    {
        //
    }
}
