<?php

namespace App\Http\Controllers;

use App\Models\Avoirstatut;
use App\Models\Bailleur;
use App\Models\Cabinet;
use App\Models\Client;
use App\Mail\Mailtrap;
use App\Models\Expert;
use App\Models\Montant;
use App\Models\Pays;
use App\Models\Poste;
use App\Models\Postuler;
use App\Models\Provenir;
use App\Models\Realiser;
use App\Models\Responsable;
use App\Models\Statut;
use App\Models\Tdr;
use App\Models\Tranche;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TdrsController extends Controller
{
    public function ajouter(Request $request)
    {
        $tdrs=Tdr::all();
        $types=Type::all();
        $clients=Client::all();
        $bailleurs=Bailleur::all();
        $responsables=Responsable::all();
        $postes=Poste::all();
        $countries=Pays::all();
        $cabinets=Cabinet::all();
        return view('Pages.ajouter',[
            "tdrs"=>$tdrs,
            "clients"=>$clients,
            "types"=>$types,
            "bailleurs"=>$bailleurs,
            "responsables"=>$responsables,
            "countries"=>$countries,
            "postes"=>$postes,
            "cabinets"=>$cabinets,
        ]);
    }
    public function index()
    {
        $tdrs=Tdr::all();
        $postuler=Postuler::all();
        $clients=Client::all();
        $types=Type::all();
        return view('Pages.tdr',[
            "tdrs"=>$tdrs,
            "clients"=>$clients,
            "postuler"=>$postuler,
            "types"=>$types,
        ]);
    }
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

    public function postulerindex()
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

    public function postulerstore(Request $request)
    {
           $postuler = Postuler::all();
             $titre=Tdr::where('id',$request->id_tdr)->first();
            if(!Storage::exists('/public_path/offremi')) {
                Storage::makeDirectory('/public_path/offreetmi', 0775, true); //creates directory
            }
            $montant = new Montant();
            $montant->montant = $request->montant;
            $montant->id_postuler = $postuler->count()+1;
            $montant->save();
            // dd('hmm'.$montant);
            $idmontant=$montant->id;
            $veriflib = Statut::where('Libelle',"$request->id_statut")->first();
            // dd($veriflib);
            $avoirstatut = new Avoirstatut();
            $avoirstatut->id_statut =  $veriflib->id;
            $avoirstatut->date_postuler =  $request->date_postuler;
            $avoirstatut->Point = "Null";
            $avoirstatut->id_postuler = $postuler->count()+1;
            $avoirstatut->save();
            $idavoirstatut=$avoirstatut->id;

            $e=count($request->id_cabinet);
            $postuler = new Postuler();
            if ($request->file('Proposition_t_f') != null) {
                $fichier = $request->file('Proposition_t_f');
                $proposition = $fichier->getClientOriginalExtension();
                $fichier->move(public_path("offreetmi/".$titre->Titre));
                $postuler->Proposition_t_f =  $proposition;
            }          
           $postuler->date_postuler = $request->date_postuler;
           $postuler->id_montant = $idmontant;
           $postuler->id_tdr = $request->id_tdr;
           $postuler->save();
           $idpostuler=$postuler->id;
           for($i=0;$i<$e;$i++){
            $provenir = new Provenir();
            $provenir->id_postuler = $idpostuler;
            $provenir->id_cabinet = $request->id_cabinet[$i];
            $provenir->save();
         }
         $b=count($request->id_expert);
        for($i=0;$i<$b;$i++){
           $realiser = new Realiser();
           $realiser->id_postuler = $idpostuler;
           $realiser->id_expert = $request->id_expert[$i];
           $realiser->save();
        }
            // $avoirstatut = new Avoirstatut();
            // $avoirstatut->id_postuler = $idpostuler;
            // $avoirstatut->Point = "Null";
            // $avoirstatut->date_postuler = $request->date_postuler;
            // $avoirstatut->save();

           toastr()->success($request->Libelle .' a été enregistré avec succès');
           return redirect()->route('index');
    }

    public function voir(Request $r)
    {
        // dd(Tdr::find($r->id));
        $tdrs=Tdr::all();
        $tdr=Tdr::find($r->id);
        // dd($tdr);
        $types=Type::all();
        $clients=Tdr::where('id_client',$tdr->id_client)->first();
        $bailleurs=Bailleur::all();
        $responsables=Tdr::where('id_responsable',$tdr->id_responsable)->first();
        $postes=Poste::all();
        $postuler=Postuler::all();
        $countries=Pays::all();
        $cabinets=Cabinet::all();
        $expert=Expert::all();
        $responsable=Responsable::all();
        $client=Client::all();
        $experts=Expert::all();
        return view('Pages.postuler',[
            "tdrs"=>$tdrs,
            "tdr"=>$tdr,
            "clients"=>$clients,
            "client"=>$client,
            "types"=>$types,
            "experts"=>$experts,
            "expert"=>$expert,
            "postuler"=>$postuler,
            "bailleurs"=>$bailleurs,
            "responsables"=>$responsables,
            "responsable"=>$responsable,
            "countries"=>$countries,
            "postes"=>$postes,
            "cabinets"=>$cabinets,
        ]);
    }

    public function detail(Request $r){
        $tdrs=Tdr::all();
        $tdr=Tdr::find($r->id);
        // dd($tdr);
        $types=Type::all();
        $clients=Tdr::where('id_client',$tdr->id_client)->first();
        $bailleurs=Bailleur::all();
        $responsables=Tdr::where('id_responsable',$tdr->id_responsable)->first();
        $postes=Poste::all();
        $postuler=Postuler::all();
        $countries=Pays::all();
        $cabinets=Cabinet::all();
        $expert=Expert::all();
        $responsable=Responsable::all();
        $client=Client::all();
        $provenir=Provenir::all();
        $poste=Poste::all();
        $tranches=Tranche::all();
        $montants=Montant::all();
        $realisers=Realiser::all();
        // $experts=Realiser::where('id_tdr',$tdr->id)->first();
        return view('detail',[
            "tdrs"=>$tdrs,
            "tdr"=>$tdr,
            "realiser"=>$realisers,
            "clients"=>$clients,
            "client"=>$client,
            "poste"=>$poste,
            "types"=>$types,
            "provenir"=>$provenir,
            "tranche"=>$tranches,
            // "experts"=>$experts,
            "expert"=>$expert,
            "montant"=>$montants,
            "postuler"=>$postuler,
            "bailleurs"=>$bailleurs,
            "responsables"=>$responsables,
            "responsable"=>$responsable,
            "countries"=>$countries,
            "postes"=>$postes,
            "cabinets"=>$cabinets,
        ]);
    }
    public function userindex(){
        $users=User::all();
        $postes=Poste::all();
        $responsables=Responsable::all();
        return view('pages/users/registre',[
            "user"=>$users,
            "responsable"=>$responsables,
            "poste"=>$postes,
        ]);

    }
    public function registreuser(Request $request){
        $vefifpersonnel=Responsable::where('Email',$request->id_responsable)->first();
        if (!$vefifpersonnel) {
            return redirect()->route('userindex');
            return back();
        }else{
            if(!Storage::exists('/public_path/users/images')) {

                Storage::makeDirectory('/public_path/users/images', 0775, true); //creates directory
            }
            $user = new User();
            if ($request->file('image') != null) {
                $fichier = $request->file('image');
                $image =  $vefifpersonnel->Nom.''. $vefifpersonnel->Prenoms.'.'.$fichier->getClientOriginalExtension();
                $fichier->move(public_path("users/images"), $image);
                $user->image = $image;
            }
            $user->id_responsable =  $vefifpersonnel->id;
            $user->password =  bcrypt($vefifpersonnel->Nom.''.$vefifpersonnel->Prenoms);
            $user->save();
            return redirect()->route('userindex');
        }
    }
    public function login(Request $request){
        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;
        // $credential=$this->getCredentials($request);
        // if(Auth::attempt($credential)){
        //     $responsable = Responsable::where(["Email" => $credential['Email']])->first();
        
        //     Auth::login($responsable, $remember_me);
        
        //     // redirect authenticated user to another page
        // }

        $vefifpersonnel=Responsable::where('Email',$request->id_responsable)->first();
        $verifpasswor=User::where('password',$request->password)->first();
        if (!$vefifpersonnel || !$verifpasswor) {

            return view('pages/users/login');
            return back();
        }else{
            return view('pages/accueil');
        }
    }
    public function restorpassword(Request $request){
        $vefifpersonnel=Responsable::where('Email',$request->id_responsable)->first();
        $verifpasswor=User::where('id_responsable',$vefifpersonnel->id)->first();
        if (!$vefifpersonnel) {
            return view('pages/users/login');
        }else{
           
                $user = $vefifpersonnel->Prenoms.' '. $vefifpersonnel->Nom;
                $passs = $verifpasswor->password;
            
            Mail::to($vefifpersonnel->Email)->send(new Mailtrap($user, $passs));
            return view('pages/users/login');
        }
    }
    public function forgetpassword(){
        return view('pages/users/forgertpassword');
    }
    public function connexion(){
        return view('pages/users/login');
    }
}
