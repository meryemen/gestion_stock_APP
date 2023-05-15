<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Equipement;
use App\Models\Personne;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class StockController extends Controller
{
  public function stock(){
    $data = array();
      if(Session::has('loginId')){
         $data = User::where('id','=',Session::get('loginId'))->first();}
    $equipments = array();
    $equipments = Equipement::all();
    return view('stock', compact('equipments','data'));
  }
  

  public function dashboard(Request $request){
    $data = array();
    if(Session::has('loginId')){
       $data = User::where('id','=',Session::get('loginId'))->first();
    }
          $inuse = Equipement::where('statut', 'In Use')->where('type','materiel')->count();
          $munisys = Equipement::where('statut', 'In Stock / Munisys')->where('type','materiel')->count();
          $louisrey = Equipement::where('statut', 'In Stock / Louis Rey')->where('type','materiel')->count();
          $site = Equipement::where('statut', 'In Stock / Site')->where('type','materiel')->count();
          $maintenance = Equipement::where('statut', 'In Maintenance')->where('type','materiel')->count();
          $pending = Equipement::where('statut', 'Pending Install')->where('type','materiel')->count();
          $retirement = Equipement::where('statut', 'Retirement')->where('type','materiel')->count();
          $stolen = Equipement::where('statut', 'Stolen')->where('type','materiel')->count();
          $don = Equipement::where('statut', 'Don')->where('type','materiel')->count();
          $materiel = Equipement::where('type', 'materiel')->count();
          $access = Equipement::where('type', 'accessoire')->count();
          $accessoire = Equipement::where('type', 'accessoire')
             ->where('statut', 'in use')
             ->count();
          $user = User::where('profil', 'Utilisateur')->count();



return view('dashboard', compact('retirement','stolen','don','inuse','munisys','louisrey','site','maintenance','pending','data','materiel','user','accessoire'));

}

  public function formulaire(){
    
    $data = array();
    if(Session::has('loginId')){
       $data = User::where('id','=',Session::get('loginId'))->first();
    }
    $fournisseur = array();
    $fournisseur = Fournisseur::pluck('nom_four')->all();

    return view ('ajoutequip',compact('data','fournisseur'));
  }

  public function ajout(Request $request)
      { $data = array();
        if(Session::has('loginId')){
          $data = User::where('id','=',Session::get('loginId'))->first();
        }
        $equipments = array();
        $equipments = Equipement::all();


      $type = $request->input('type');
      $categorie = $request->input('categorie');
      $produit = $request->input('produit');
      $numeroSerie = $request->input('numero_serie');
      $statut = $request->input('statut');
      $prix = $request->input('prix');
      $cracteristique_tech = $request->input('cracteristique_tech');
      $netbios = $request->input('netbios');
      $fournisseur = $request->input('fournisseur');
      $nomPrenom = $request->input('nom_prenom');
      $username = $request->input('username');
      $dateAffectation = $request->input('date_affectation');
      $region = $request->input('region');
      $direction = $request->input('direction');
      $site = $request->input('site');

    if($statut == '1'){
      $personneExistante = Personne::where('username', $username)->first();

          if ($personneExistante) {
              $personneId = $personneExistante->getKey(); 
          } else {
              $personne = new Personne();
              $personne->nom_prenom = $nomPrenom;
              $personne->username = $username;
              $personne->date_affectation = $dateAffectation;
              $personne->region = $region;
              $personne->direction = $direction;
              $personne->site = $site;
              $personne->save();
      
              $personneId = $personne->getKey();
          }
          $fourni = Fournisseur::where('nom_four', $fournisseur)->first();
          if ($fourni) {
              $idfourni = $fourni->getKey();
              
              
          $equipement = new Equipement();
          $equipement->type = $type;
          $equipement->categorie = $categorie;
          $equipement->produit = $produit;
          $equipement->n_serie = $numeroSerie;
          $equipement->statut = $statut;
          $equipement->prix = $prix;
          $equipement->netbios = $netbios;
          $equipement->cracteristique_tech = $cracteristique_tech;
          $equipement->id_pers = $personneId;
          $equipement->id_fourni = $idfourni;
          $equipement->save();
          }
        }
      
  
      
    else{
      $fourni = Fournisseur::where('nom_four', $fournisseur)->first();
          if ($fourni) {
              $idfourni = $fourni->getKey();
      $equipement = new Equipement();
      $equipement->type = $type;
      $equipement->categorie = $categorie;
      $equipement->produit = $produit;
      $equipement->n_serie = $numeroSerie;
      $equipement->statut = $statut;
      $equipement->prix = $prix;
      $equipement->netbios = $netbios;
      $equipement->cracteristique_tech = $cracteristique_tech;
      $equipement->id_fourni = $idfourni;
      $equipement->save();
    }
  } 
  
      return redirect()->route('stock',compact('equipments','data'))->with('success', 'Equipement ajouté ');
    
    
  }
}