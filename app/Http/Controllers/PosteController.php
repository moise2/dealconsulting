<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Pays;
use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poste=Poste::all();
        $experts=Expert::all();
        $countries=Pays::all();
        return view('Pages.poste',[
            "postes"=>$poste,
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
        $poste = Poste::all();
        $veriflibelle = Poste::where('Libelle',$request->Libelle)->first();
        if ($veriflibelle != null) {
            toastr()->error($request->Libelle.' existe déjà!');
            return redirect()->route('poste.index');
        }

           $poste = new Poste();
           $poste->Description = $request->Description;
           $poste->Libelle = $request->Libelle;
           $poste->save();
           toastr()->success($request->Libelle .' a été enregistré avec succès');
           return redirect()->route('poste.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function show(Poste $poste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function edit(Poste $poste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poste $poste)
    {
        $poste = Poste::find($poste->id);
        $poste->Description = $request->Description;
        $poste->Libelle = $request->Libelle;
        $poste->save();
        toastr()->success($request->Libelle .' a été enregistré avec succès');
        return redirect()->route('poste.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poste $poste)
    {
        //
    }
}
