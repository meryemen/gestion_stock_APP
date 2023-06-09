<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Historique;
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
          $maintenance = Equipement::where('statut', 'In Maintenace')->where('type','materiel')->count();
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
          
          $USB=Equipement::where('categorie','USB')->count();
          $Sacàdos=Equipement::where('categorie','Sac à dos')->count();
          $sourissfil=Equipement::where('categorie','Souris sans fil')->count();
          $sourisafil=Equipement::where('categorie','Souris avec fil')->count();
          $ch45=Equipement::where('categorie','Chargeur 45W')->count();
          $ch65=Equipement::where('categorie','Chargeur 65W')->count();




          $user = User::where('profil', 'Utilisateur')->count();

        

        return view('dashboard', compact('retirement','stolen','don','inuse',
        'munisys','louisrey','site','maintenance','pending','data',
        'materiel','user','accessoire','laptop','desktop','monitor',
        'scanner','printer','projector','USB','Sacàdos','sourissfil','sourisafil','ch45','ch65'));

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
        $personneExistante = Personne::where('nom_prenom', $nomPrenom)->first();
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
   
        $bonDeLivraison = new Bon_livraison([
            'id_livre' => $numeroL,
            'date_livre' => $dateBl,
            'qt_livre' => $QTL,
            'id_fourni' => $fourni->id_fourni,
            'id_com' => $bonDeCommande->id_com
        ]);
        $bonDeLivraison->save();
    
        $livraisonExistante = Bon_livraison::where('id_livre', $numeroL)->first();

       
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
            $equipement->id_livre = $livraisonExistante->id_livre;
        
            $equipement->save();

        $affectation = new Affectation();
        $affectation->id_equ = $equipement->id_equ;
        $affectation->id_pers = $personneId;
        $affectation->date_affectation = $dateAffectation;
        $affectation->save();

        $historique = new Historique();
        $historique->modified_at = now();
        $historique->modified_by = $data->nom . ' ' . $data->prenom; 
        $historique->type_modif = 'Create';
        $historique->aqui = 'equipements';
        $historique->comment = 'Ajout d\'un nouveau equipement : '.$equipement->type .' / '. $equipement->n_serie ;
        $historique->save();
        if($equipement->type == 'materiel'){
            return redirect()->route('stock',compact('data'))->with('success', 'Equipement ajouté ');
        }else{
            return redirect()->route('accessoire',compact('data'))->with('success', 'Equipement ajouté ');
        }
        
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
 
      $bonDeLivraison = new Bon_livraison([
        'id_livre' => $numeroL,
        'date_livre' => $dateBl,
        'qt_livre' => $QTL,
        'id_fourni' => $fourni->id_fourni,
        'id_com' => $bonDeCommande->id_com
    ]);
    $bonDeLivraison->save();
    $livraisonExistante = Bon_livraison::where('id_livre', $numeroL)->first();
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
    $equipement->id_livre = $livraisonExistante->id_livre;
        
        
        $equipement->save();
        $historique = new Historique();
        $historique->modified_at = now();
        $historique->modified_by = $data->nom . ' ' . $data->prenom; 
        $historique->type_modif = 'Create';
        $historique->aqui = 'equipements';
        $historique->comment = 'Ajout d\'un nouveau equipement : '.$equipement->type .' / '. $equipement->n_serie ;
        $historique->save();

      
        if($equipement->type == 'materiel'){
            return redirect()->route('stock',compact('data'))->with('success', 'Equipement ajouté ');
        }else{
            return redirect()->route('accessoire',compact('data'))->with('success', 'Equipement ajouté ');
        }      }
  }
 public function edit($id_equ){
  $data = array();
  if(Session::has('loginId')){
     $data = User::where('id','=',Session::get('loginId'))->first();
  }
  $fournisseur = array();
  $fournisseur = Fournisseur::pluck('nom_four')->all();
  
  $equipement = Equipement::find($id_equ);
  

  return view ('stock',compact('data','fournisseur', 'equipement'));
 }


  public function accessoire(){
    $data = array();
    if (Session::has('loginId')) {
        $data = User::where('id', '=', Session::get('loginId'))->first();
    }

    $equipments = Equipement::with('personne')->get();
    $fournisseur = array();
    $fournisseur = Fournisseur::pluck('nom_four')->all();

    return view('accessoire', compact('equipments', 'data','fournisseur'));
  }

  //search materiel
  public function search_materiel(Request $request){
    $data = array();
    if(Session::has('loginId')){
        $data = User::where('id', '=', Session::get('loginId'))->first();
    }
    $get_id = $request->materiel_search;
    $equipments = Equipement::where('categorie', 'like', '%'. $get_id.'%')
    ->orwhere('n_serie', 'like', '%'. $get_id.'%')
    ->orwhere('statut', 'like', '%'. $get_id.'%')
    ->orwhere('netbios', 'like', '%'. $get_id.'%')
    ->orwhere('cracteristique_tech', 'like', '%'. $get_id.'%')
    ->get();
    
    return view('search_materiel', compact('data', 'equipments','get_id'));
}
  //search materiel
  public function search_access(Request $request){
    $data = array();
    if(Session::has('loginId')){
        $data = User::where('id', '=', Session::get('loginId'))->first();
    }
    $get_id = $request->access_search;
    $equipments = Equipement::where('categorie', 'like', '%'. $get_id.'%')
    ->orwhere('n_serie', 'like', '%'. $get_id.'%')
    ->orwhere('statut', 'like', '%'. $get_id.'%')
    ->get();
    
    return view('search_access', compact('data', 'equipments','get_id'));
}

  public function info(){
    $data = array();
    if (Session::has('loginId')) {
        $data = User::where('id', '=', Session::get('loginId'))->first();
    }
    $fournisseur = array();
    $fournisseur = Fournisseur::pluck('nom_four')->all();

    return view('info', compact('data','fournisseur'));
  }

 

  public function edit_materiel(Request $request, $id_equ){
    $data = array();
    if (Session::has('loginId')) {
        $data = User::where('id', '=', Session::get('loginId'))->first();
    }
        $equip = Equipement::find($id_equ);


        $equip->type = $request->input('type');
        $equip->categorie = $request->input('categorie');
        $equip->produit = $request->input('produit');
        $equip->n_serie = $request->input('numero_serie');
        $equip->statut = $request->input('statut');
        $equip->prix = $request->input('prix');
        $equip->cracteristique_tech = $request->input('cracteristique_tech');
        $equip->netbios = $request->input('netbios');


        if($request->input('statut') != "In Stock / Site" && $request->input('statut') != "In Stock / Munisys" && $request->input('statut') != "In Stock / Louis Rey") {
            $username = $request->input('username');
            $existingPersonne = Personne::where('username', $username)->first();

            if (!$existingPersonne) {
                $personne = new Personne();
                // Définissez les propriétés de la personne à partir des données du formulaire
                $personne->nom_prenom = $request->input('nom_prenom');
                $personne->site = $request->input('site');
                $personne->region = $request->input('region');
                $personne->direction = $request->input('direction');
                $personne->username = $username;
                // Sauvegardez la personne
                $personne->save();
                
                $affectation= new Affectation();
                $affectation->date_affectation = $request->input('date_affectation');
                $affectation->id_equ = $equip->id_equ;
                $affectation->id_pers = $personne->id_pers;
                $affectation->save();

                $historique = new Historique();
                $historique->modified_at = now();
                $historique->modified_by = $data->nom . ' ' . $data->prenom; 
                $historique->type_modif = 'Update';
                $historique->aqui = 'equipements';
                $historique->comment = 'L\'equipement '.$equip->categorie .' / '. $equip->n_serie . ' est affecté à :'. $personne->nom_prenom;
                $historique->save();

        
                // Associez la nouvelle personne à l'équipement
                $equip->personne()->associate($personne);
            } else {
                // Si la personne existe déjà, mettez simplement à jour ses propriétés
                $existingPersonne->nom_prenom = $request->input('nom_prenom');
                $existingPersonne->site = $request->input('site');
                $existingPersonne->region = $request->input('region');
                $existingPersonne->direction = $request->input('direction');
                $existingPersonne->username = $username;
            
                $equip->personne()->associate($existingPersonne);
                
                $equip->id_pers = $equip->personne->id_pers;

                $affectation= new Affectation();
                $affectation->date_affectation = $request->input('date_affectation');
                $affectation->id_equ = $equip->id_equ;
                $affectation->id_pers = $equip->personne->id_pers;
                $affectation->save();


                $historique = new Historique();
                $historique->modified_at = now();
                $historique->modified_by = $data->nom . ' ' . $data->prenom; 
                $historique->type_modif = 'Update';
                $historique->aqui = 'equipements';
                $historique->comment = 'L\'equipement '.$equip->categorie .' / '. $equip->n_serie . ' est affecté à :'. $equip->personne->nom_prenom;
                $historique->save();
                
            }
            }
            $equip->bonCommande->id_com =  $request->input('numeroC');
            $equip->bonCommande->date_cm =  $request->input('dateBc');
            $equip->bonCommande->qt_commande =  $request->input('QTC');
            $equip->bonCommande->save();

            $equip->bonLivraison->id_livre =  $request->input('numeroL');
            $equip->bonLivraison->date_livre =  $request->input('dateBl');
            $equip->bonLivraison->qt_livre =  $request->input('QTL');
            $equip->bonLivraison->save();


            $equip->save();
            
            // Rediriger vers la page de détails de l'équipement modifié
            if($equip->type == 'materiel'){
                return redirect()->route('stock',compact('data'))->with('success', 'Equipement modifié ');
            }else{
                return redirect()->route('accessoire',compact('data'))->with('success', 'Equipement modifié ');

            }
            }
       


 
  }



