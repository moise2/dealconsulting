<?php

namespace App\Http\Controllers;

use App\Models\Postuler;
use App\Models\Tdr;
use App\Models\Tranche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tranche=Tranche::all();
        return view('Pages.tranche',[
            "tranches"=>$tranche
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
        $tdr = Tranche::all();
        $titreverif = Tranche::where('Libelle',$request->Titre)->first();
        if ($titreverif != null) {
            toastr()->error($request->Libelle.' existe déjà!');
            return redirect()->route('tranche.index');
        }
        $postulerverif = Postuler::where('id',$request->id_tranche)->first();
        if ($postulerverif != null) {
            $veriftdr = Tdr::where('id',$postulerverif->id_tdr)->first();
            if ($postulerverif != null) {
                $veriflibell = Tdr::where('Libelle',$veriftdr->Libelle)->first();
                if ($veriflibell != null) {
                    $val=$veriflibell->Libelle;
                    if(!Storage::exists('/public_path/offremi/')) {

                        Storage::makeDirectory('/public_path/offreetmi', 0775, true); //creates directory
                    }
                    if ($request->file($val) != null) {
                        $fichier = $request->file('fichier');
                        $fch = $fichier->getClientOriginalExtension();
                        $fichier->move(public_path("offreetmi/".$val));
                        $tranche = new Tranche();
                        $tranche->Libelle = $request->Libelle.$tdr->count();
                        $tranche->Montant = $request->Montant;
                        $tranche->Date_tranche = $request->Date_tranche;
                        $tranche->fichier = $request->fch;
                        $tranche->Heure = $request->Heure;
                        $tranche->id_postuler = $request->id_postuler;
                        $tranche->Description = $request->Description;
                        $tranche->save();
                        toastr()->success($request->Libelle .' a été enregistré avec succès');
                        return redirect()->route('tranche.index');
                        // $postuler->Proposition_t_f =  $proposition;
                    }
                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tranche  $tranche
     * @return \Illuminate\Http\Response
     */
    public function show(Tranche $tranche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tranche  $tranche
     * @return \Illuminate\Http\Response
     */
    public function edit(Tranche $tranche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tranche  $tranche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tranche $tranche)
    {
        $postulerverif = Postuler::where('id',$request->id_tranche)->first();
        if ($postulerverif != null) {
            $veriftdr = Tdr::where('id',$postulerverif->id_tdr)->first();
            if ($postulerverif != null) {
                $veriflibell = Tdr::where('Libelle',$veriftdr->Libelle)->first();
                if ($veriflibell != null) {
                    $val=$veriflibell->Libelle;
                    $tranche=Tranche::find($tranche->id);
                    if(file_exists(public_path().'/public_path/offreetmi/'.$tranche->fichier)){
                        unlink(public_path().'/public_path/offreetmi/'.$tranche->fichier);
                    }
                    if(!Storage::exists('/public_path/offremi/')) {

                        Storage::makeDirectory('/public_path/offreetmi', 0775, true); //creates directory
                    }
                    if ($request->file($val) != null) {
                        $fichier = $request->file('fichier');
                        $fch = $fichier->getClientOriginalExtension();
                        $fichier->move(public_path("offreetmi/".$val));
                        $tranche->Libelle = $request->Libelle;
                        $tranche->Montant = $request->Montant;
                        $tranche->Date_tranche = $request->Date_tranche;
                        $tranche->fichier = $request->fch;
                        $tranche->Heure = $request->Heure;
                        $tranche->id_postuler = $request->id_postuler;
                        $tranche->Description = $request->Description;
                        $tranche->save();
                        toastr()->success($request->Libelle .' a été enregistré avec succès');
                        return redirect()->route('tranche.index');
                        // $postuler->Proposition_t_f =  $proposition;
                    }
                }
    }
    }
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tranche  $tranche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tranche $tranche)
    {
        //
    }
}
