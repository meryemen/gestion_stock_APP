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
        $historique = new Historique();
        $historique->modified_at = now();
        $historique->modified_by = $data->nom . ' ' . $data->prenom; 
        $historique->type_modif = 'Create';
        $historique->comment = 'Ajout d\'un nouveau equipement : '.$equipement->type .''. $equipement->n_serie ;
        $historique->save();

      
        return redirect()->route('stock',compact('data'))->with('success', 'Equipement ajouté ');
      }
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

    return view('accessoire', compact('equipments', 'data'));
  }

  //search materiel
  public function search(Request $request){
    if($request->ajax()){
      $data = Equipement::where('produit', 'like', '%' . $request->search . '%')
      ->orWhere('categorie', 'like', '%' . $request->search . '%')
      ->orWhere('n_serie', 'like', '%' . $request->search . '%')
      ->orWhere('statut', 'like', '%' . $request->search . '%')
      ->orWhere('netbios', 'like', '%' . $request->search . '%')
      ->with('personne')
      ->get();
      $output='';
      if(count($data)>0){
          $output ='
          
              <table class="table" style="table-layout: fixed; width: 100%;">
              <thead>
              <tr>
              
              <th class="text-success">Catégorie</th>
              <th class="text-success">Produit</th>
              <th class="text-success">Numéro de série</th>
              <th class="text-success">Caractéristique Tech</th>
              <th class="text-success">Statut</th>
              <th class="text-success">NetBios</th>
              <th class="text-success">Nom & Prenom</th>
              <th class="text-success">Site</th>
              <th class="text-success">Région</th>
              <th class="text-success">Direction</th>
              <th class="text-success">Action</th>
              
              </tr>
              </thead>
              <tbody>';
                  foreach($data as $row){
                      $output .='
                      <tr>
                      <td>'.$row->categorie.'</td>
                      <td>'.$row->produit.'</td>
                      <td>'.$row->n_serie.'</td>
                      <td>'.$row->statut.'</td>
                      <td>'.$row->netbios.'</td>
                      <td>'.$row->cracteristique_tech.'</td>
                   
                    <td class="text-overflow">
                            <a data-bs-toggle="modal" data-bs-target="#editModal'.$row->id_equ.'" class="edit text-warning" ><i class="ri ri-pencil-fill"></i></a>               
                            <!-- Modal edit -->
                            <div class="modal fade" id="editModal'.$row->id_equ.'" tabindex="-1" aria-labelledby="editModalLabel'.$row->id_equ.'" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-success" id="editModalLabel'.$row->id_equ.'"><i class="bi bi-pencil"></i>  Modifier</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="'.route('edit-utilisateur', $row->id_equ).'" method="POST">
                                                '.csrf_field().'
                                                <div class="row mb-3">
                                                    <label for="fournisseur" class="col-sm-2 col-form-label">Fournisseur :</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="fournisseur" required class="form-control" value="'.(isset($equipement) ? $equipement->type : '').'">
                                                    </div>
                                                    <label for="responsable" class="col-sm-2 col-form-label">Responsable :</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="responsable" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                                                    <div class="col-sm-4">
                                                        <input type="text"  name="email" required class="form-control">
                                                    </div>
                                                    <label for="adresse" class="col-sm-2 col-form-label">Adresse :</label>
                                                    <div class="col-sm-4">
                                                        <input type="text"  name="adresse" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="site" class="col-sm-2 col-form-label">Télephone-Site :</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="site" required class="form-control">
                                                    </div>
                                                    <label for="agence" class="col-sm-2 col-form-label">Télephone-Agence :</label>
                                                    <div class="col-sm-4">
                                                        <input type="text"  name="agence" required class="form-control">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-success">Confirmer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href="#deleteEmployeeModal" class="text-success"><i class="bi bi-arrow-90deg-right"></i></a>
                    </td>
                </tr>';
                  }
          $output .= '
              </tbody>
              </table>';
      }
      else{
          $output .='Aucun résultat trouvé';
      }
      return $output;
  }
}

  

 
}