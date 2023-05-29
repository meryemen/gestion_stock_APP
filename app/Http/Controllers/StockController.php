<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\User;
use App\Models\Equipement;
use App\Models\Personne;
use App\Models\Fournisseur;
use App\Models\Bon_commande;
use App\Models\Bon_livraison;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class StockController extends Controller
{
  public function stock()
  {
      $data = array();
      if (Session::has('loginId')) {
          $data = User::where('id', '=', Session::get('loginId'))->first();
      }
  
      $equipments = Equipement::with('personne')->get();
  
      return view('stock', compact('equipments', 'data'));
  }
  

  public function dashboard(Request $request){
    $data = array();
    if(Session::has('loginId')){
       $data = User::where('id','=',Session::get('loginId'))->first();
    }
         //Status des materiels
          $inuse = Equipement::where('statut', 'In Use')->where('type','materiel')->count();
          $munisys = Equipement::where('statut', 'In Stock / Munisys')->where('type','materiel')->count();
          $louisrey = Equipement::where('statut', 'In Stock / Louis Rey')->where('type','materiel')->count();
          $site = Equipement::where('statut', 'In Stock / Site')->where('type','materiel')->count();
          $maintenance = Equipement::where('statut', 'In Maintenance')->where('type','materiel')->count();
          $pending = Equipement::where('statut', 'Pending Install')->where('type','materiel')->count();
          $retirement = Equipement::where('statut', 'Retirement')->where('type','materiel')->count();
          $stolen = Equipement::where('statut', 'Stolen')->where('type','materiel')->count();
          $don = Equipement::where('statut', 'Don')->where('type','materiel')->count();

         // materiel et accessoires en general
          $materiel = Equipement::where('type', 'materiel')->count();
          $accessoire = Equipement::where('type', 'accessoire')->count();
         
          //type des materiels
          $laptop= Equipement::where('categorie','PC')->where('produit','laptop')->count();
          $desktop=Equipement::where('categorie','PC')->where('produit','desktop')->count();
          $monitor=Equipement::where('categorie','Monitor')->count();
          $scanner=Equipement::where('categorie','Scanner')->count();
          $printer=Equipement::where('categorie','Printer')->count();
          $projector=Equipement::where('categorie','Video projector')->count();



          $user = User::where('profil', 'Utilisateur')->count();



        return view('dashboard', compact('retirement','stolen','don','inuse',
        'munisys','louisrey','site','maintenance','pending','data',
        'materiel','user','accessoire','laptop','desktop','monitor',
        'scanner','printer','projector'));

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




  
  public function ajout(Request $request){ 
    $data = array();
        if(Session::has('loginId')){
          $data = User::where('id','=',Session::get('loginId'))->first();
        }
       

//Récuperer les valeurs saisie
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
      $numeroC = $request->input('numeroC');
      $dateBc = $request->input('dateBc');
      $QTC = $request->input('QTC');
      $numeroL = $request->input('numeroL');
      $dateBl = $request->input('dateBl');
      $QTL = $request->input('QTL');
      


      if ($statut == 'In Use' || $statut == 'In Maintenace' ||$statut == 'Pending Install'|| $statut == 'Retirement'||$statut == 'Stolen' ||$statut == 'Don' ) {
        $personneExistante = Personne::where('username', $username)->first();
        $fourni = Fournisseur::where('nom_four', $fournisseur)->first();
    
        if ($personneExistante) {
            $personneId = $personneExistante->id_pers;
        } else {
            $person = Personne::firstOrCreate(['username' => $username], [
                'nom_prenom' => $nomPrenom,
                'region' => $region,
                'direction' => $direction,
                'site' => $site
            ]);
            $personneId = $person->id_pers;
        }
    
        $bonDeCommande = Bon_commande::firstOrCreate(
            ['id_com' => $numeroC],
            [
                'date_cm' => $dateBc,
                'qt_commande' => $QTC,
                'id_fourni' => $fourni->id_fourni
            ]
        );
   
        $bonDeLivraison = Bon_livraison::firstOrCreate(
          ['id_livre' => $numeroL],
          [
              'date_livre' => $dateBl,
              'qt_livre' => $QTL,
              'id_fourni' => $fourni->id_fourni,
              'id_com' => $bonDeCommande->id_com
          ]
      );
    
        $equipement = new Equipement();
        $equipement->type = $type;
        $equipement->categorie = $categorie;
        $equipement->produit = $produit;
        $equipement->n_serie = $numeroSerie;
        $equipement->statut = $statut;
        $equipement->prix = $prix;
        $equipement->cracteristique_tech = $cracteristique_tech;
        $equipement->netbios = $netbios;
        $equipement->id_pers = $personneId;
        $equipement->id_fourni = $fourni->id_fourni;
        $equipement->id_com = $bonDeCommande->id_com;
        $equipement->id_livre = $bonDeLivraison->id_livre;
        $equipement->save();

        $affectation = new Affectation();
        $affectation->id_equ = $equipement->id_equ;
        $affectation->id_pers = $personneId;
        $affectation->date_affectation = $dateAffectation;
        $affectation->save();

        return redirect()->route('stock',compact('data'))->with('success', 'Equipement ajouté ');
      }else{
        $fourni = Fournisseur::where('nom_four', $fournisseur)->first();
        $bonDeCommande = Bon_commande::firstOrCreate(
          ['id_com' => $numeroC],
          [
              'date_cm' => $dateBc,
              'qt_commande' => $QTC,
              'id_fourni' => $fourni->id_fourni
          ]
      );
 
      $bonDeLivraison = Bon_livraison::firstOrCreate(
        ['id_livre' => $numeroL],
        [
            'date_livre' => $dateBl,
            'qt_livre' => $QTL,
            'id_fourni' => $fourni->id_fourni,
            'id_com' => $bonDeCommande->id_com
        ]
        );
        $equipement = new Equipement();
        $equipement->type = $type;
        $equipement->categorie = $categorie;
        $equipement->produit = $produit;
        $equipement->n_serie = $numeroSerie;
        $equipement->statut = $statut;
        $equipement->prix = $prix;
        $equipement->cracteristique_tech = $cracteristique_tech;
        $equipement->netbios = $netbios;
        
        $equipement->id_fourni = $fourni->id_fourni;
        $equipement->id_com = $bonDeCommande->id_com;
        $equipement->id_livre = $bonDeLivraison->id_livre;
        
        $equipement->save();

      
        return redirect()->route('stock',compact('data'))->with('success', 'Equipement ajouté ');
      }
  }
 public function edit(){
  $data = array();
  if(Session::has('loginId')){
     $data = User::where('id','=',Session::get('loginId'))->first();
  }
  $fournisseur = array();
  $fournisseur = Fournisseur::pluck('nom_four')->all();

  

  return view ('edit',compact('data','fournisseur'));
 }


  public function accessoire(){
    $data = array();
    if(Session::has('loginId')){
      $data = User::where('id','=',Session::get('loginId'))->first();
    }
    return view('accessoire', compact('data'));
  }

 
}