<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Pays;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Pays::all();
        $clients=Client::all();
        return view('pages.client',[
            'countries'=>$countries,
            'clients'=>$clients,
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
        $client = Client::all();
        $verifLibell = Client::where('Libelle',$request->Libelle)->first();
        if ($verifLibell != null) {
            Toastr()->error($request->Libelle.'existe déjà!');
            return redirect()->route('client.index');
        }
        $verifemail = Client::where('Email',$request->Email)->first();
        if ($verifemail != null) {
            Toastr()->error($request->Email.' existe déjà!');
            return redirect()->route('client.index');
        }
        $client = new Client();
           $client->Libelle = $request->Libelle;
           $client->Pays = $request->Pays;
           $client->Libelle = $request->Libelle;
           $client->Email = $request->Email;
           $client->Telephone = $request->Telephone;
           $client->Adresse = $request->Adresse;
           $client->save();
           Alert::toast('Success', $request->Libelle.' a été enregistré avec succès');
           return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cabinet=Client::find($id);
        $cabinet->Libelle = $request->Libelle;
        $cabinet->Pays = $request->Pays;
        $cabinet->Libelle = $request->Libelle;
        $cabinet->Email = $request->Email;
        $cabinet->Telephone = $request->Telephone;
        $cabinet->Adresse = $request->Adresse;
        $cabinet->save();
        Toastr()->success($request->Libelle.' a été enregistré avec succès');
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
