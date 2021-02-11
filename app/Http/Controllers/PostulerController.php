<?php

namespace App\Http\Controllers;

use App\Models\Bailleur;
use App\Models\Cabinet;
use App\Models\Client;
use App\Models\Pays;
use App\Models\Poste;
use App\Models\Postuler;
use App\Models\Responsable;
use App\Models\Tdr;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Pays::all();
        $postulers=Postuler::all();
        $cabinets=Cabinet::all();
        $postes=Poste::all();
        $tdrs=Tdr::all();
        $types=Type::all();
        $bailleurs=Bailleur::all();
        $clients=Client::all();
        $responsables=Responsable::all();
        return view('Pages.postuler',[
            "postulers"=>$postulers,
            "postes"=>$postes,
            "countries"=>$countries,
            "cabinets"=>$cabinets,
            "tdrs"=>$tdrs,
            "types"=>$types,
            "bailleurs"=>$bailleurs,
            "clients"=>$clients,
            "responsables"=>$responsables,
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
    public function store(Request $request,$id)
    {
        $postuler = Postuler::all();
        $veriflibelle = Postuler::where('Statut',$request->Statut)->where('Statut',$request->id_tdr)->first();
        if ($veriflibelle != null) {
            toastr()->error($request->Statut.' existe déjà!');
            return redirect()->route('poste.index');
        }
             $titre=$postuler->tdr->Titre;
            if(!Storage::exists('/public_path/offremi')) {
                Storage::makeDirectory('/public_path/offreetmi', 0775, true); //creates directory
            }
            $postuler = new Postuler();
            if ($request->file('Proposition_t_f') != null) {
                $fichier = $request->file('Proposition_t_f');
                $proposition = $fichier->getClientOriginalExtension();
                $fichier->move(public_path("offreetmi/".$titre));
                $postuler->Proposition_t_f =  $proposition;
            }
            
           $postuler->Statut = $request->Statut;
           $postuler->id_babinet = $request->id_babinet;
           $postuler->id_tdr = $request->id_tdr;
           $postuler->Date = $request->Date;
           $postuler->Point = $request->Point;
           $postuler->Proposition_t_f = $request->Proposition_t_f;
           $postuler->save();
           toastr()->success($request->Libelle .' a été enregistré avec succès');
           return redirect()->route('poste.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function show(Postuler $postuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function edit(Postuler $postuler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $titre=$postuler->tdr->Titre;
        $postuler=Postuler::find($id);
        if(file_exists(public_path().'/files/offreetmi/'.$postuler->Proposition_t_f)){
            unlink(public_path().'/files/offreetmi/'.$titre."/".$postuler->Proposition_t_f);
        }
        if(!Storage::exists('/public_path/offreetmi/')) {

            Storage::makeDirectory('/public_path/offreetmi', 0775, true); //creates directory
        }

        if ($request->file('Proposition_t_f') != null) {
            $Cv = $request->file('Proposition_t_f');
            $photo_new_name =  $titre.'.'.$Cv->getClientOriginalExtension();
            $Cv->move(public_path("offreetmi/".$titre."/".$postuler->Proposition_t_f));
        $postuler->Statut = $request->Statut;
        $postuler->id_babinet = $request->id_babinet;
        $postuler->id_tdr = $request->id_tdr;
        $postuler->Date = $request->Date;
        $postuler->Point = $request->Point;
        $postuler->Proposition_t_f = $photo_new_name;
        $postuler->save();
        toastr()->success($request->Libelle .' a été enregistré avec succès');
        return redirect()->route('poste.index');
    }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postuler $postuler)
    {
        //
    }
}
