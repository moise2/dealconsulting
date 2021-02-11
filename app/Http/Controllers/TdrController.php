<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Postuler;
use App\Models\Tdr;
use App\Models\Type;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TdrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tdrs=Tdr::all();
        $types=Type::all();
        $postulers=Postuler::all();
        $clients=Client::all();
        return view('Pages.tdr',[
            "tdrs"=>$tdrs,
            "clients"=>$clients,
            "postuler"=>$postulers,
            "types"=>$types,
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
        $tdr = Tdr::all();
        $titreverif = Tdr::where('Titre',$request->Titre)->first();
        if ($titreverif != null) {
            toastr()->error($request->Titre.' existe déjà!');
            return redirect()->route('tdr.index');
        }
        $tdr = new Tdr();
           $tdr->Titre=$request->Titre;
           $tdr->id_bailleur=$request->id_bailleur;
           $tdr->id_type=$request->id_type;
           $tdr->id_client=$request->id_client;
           $tdr->id_responsable=$request->id_responsable;
           $tdr->Date_limite=$request->Date_limite;
           $tdr->Heure = $request->Heure;
           $tdr->Nbr_expert=$request->Nbr_expert;
           $tdr->N_reception=$request->N_reception;
           $tdr->Description=$request->Description;
           $tdr->save();
        //    toast('Success Toast','success');
           Alert::success('SuccessAlert', $request->Titre .' a été enregistré avec succès');
           return redirect()->route('tdr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tdr  $tdr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tdr =  Tdr::find($id);
        return redirect()->route('postuler.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tdr  $tdr
     * @return \Illuminate\Http\Response
     */
    public function edit(Tdr $tdr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tdr  $tdr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tdr $tdr)
    {
        $tdr =  Tdr::find($request->id);
        $tdr->Titre = $request->Titre;
        $tdr->id_bailleur = $request->id_bailleur;
        $tdr->Date = $request->Date;
        $tdr->Heure = $request->Heure;
        $tdr->Nbr_expert = $request->Nbr_expert;
        $tdr->N_reception = $request->N_reception;
        $tdr->Description = $request->Description;
        $tdr->save();
        Toastr()->success($request->Titre .' '.$request->Nom.' a été enregistré avec succès');
        return redirect()->route('tdr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tdr  $tdr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tdr $tdr)
    {
        //
    }


}
