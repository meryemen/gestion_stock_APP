<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Historique;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class FourniController extends Controller
{
    public function fournisseur(){
        $data = array();
        if(Session::has('loginId')){
          $data = User::where('id','=',Session::get('loginId'))->first();
        }
        $fournisseur = array();
        $fournisseur = Fournisseur::all();
        return view('fournisseur', compact('data','fournisseur'));
    }

    public function ajouter(Request $request ){
      $data = array();
      if(Session::has('loginId')){
        $data = User::where('id','=',Session::get('loginId'))->first();
      }

      $nom_four = $request->input('fournisseur');
      $responsable = $request->input('responsable');
      $email = $request->input('email');
      $adresse = $request->input('adresse');
      $tele_siege = $request->input('site');
      $tele_agence = $request->input('agence');

      $existingFournisseur = Fournisseur::where('nom_four', $nom_four)->first();
      if ($existingFournisseur) {
          return redirect()->route('fournisseur', compact('data'))->with('fail', 'Ce fournisseur existe déjà');
      }

      $fournisseur = new Fournisseur();
      $fournisseur->nom_four = $nom_four;
      $fournisseur->responsable = $responsable;
      $fournisseur->email = $email;
      $fournisseur->adresse = $adresse;
      $fournisseur->tele_siege = $tele_siege;
      $fournisseur->tele_agence = $tele_agence;
      $fournisseur->save();

         $historique = new Historique();
         $historique->modified_at = now();
         $historique->modified_by = $data->nom . ' ' . $data->prenom; 
         $historique->type_modif = 'Create';
         $historique->aqui = 'fournisseur';
         $historique->comment = 'Ajout d\'un nouveau fournisseur : '. $fournisseur->nom_four;
         $historique->save();

      return redirect()->route('fournisseur',compact('data'))->with('success', 'Fournisseur ajouté ');


    }

    public function delete($id_fourni){
      $data = array();
      if(Session::has('loginId')){
        $data = User::where('id','=',Session::get('loginId'))->first();
      }
      $fournisseur = Fournisseur::find($id_fourni);
      if ($fournisseur->equipements()->exists()) {
        return redirect()->route('fournisseur', compact('data'))->with('fail', 'Impossible de supprimer le fournisseur .');
     }
      
      $fournisseur->delete();
    
      return redirect()->route('fournisseur',compact('data'))->with('fail', 'Fournisseur supprimer ');

    }
    public function edit(Request $request, $id_fourni){
      $data = array();
      if(Session::has('loginId')){
        $data = User::where('id','=',Session::get('loginId'))->first();
      }
      $nom_four = $request->input('fournisseur');
      $responsable = $request->input('responsable');
      $email = $request->input('email');
      $adresse = $request->input('adresse');
      $tele_siege = $request->input('site');
      $tele_agence = $request->input('agence');

      $ancienfournisseur=Fournisseur::find($id_fourni);
      $fournisseur = Fournisseur::find($id_fourni);
      $fournisseur->nom_four = $nom_four;
      $fournisseur->responsable = $responsable;
      $fournisseur->email = $email;
      $fournisseur->adresse = $adresse;
      $fournisseur->tele_siege = $tele_siege;
      $fournisseur->tele_agence = $tele_agence;
      $fournisseur->save();


      $comment = '';
      
      if ($ancienfournisseur->responsable != $fournisseur->responsable) {
          $comment .= 'Responsable a été modifié de "'.$ancienfournisseur->responsable.'" à "'.$fournisseur->responsable.'". ';
      }
      
      if ($ancienfournisseur->adresse != $fournisseur->adresse) {
          $comment .= 'Adresse a été modifié de "'.$ancienfournisseur->adresse.'" à "'.$fournisseur->adresse.'". ';
      }
      
      if ($ancienfournisseur->tele_agence != $fournisseur->tele_agence) {
          $comment .= 'Tele_agence a été modifié de "'.$ancienfournisseur->tele_agence.'" à "'.$fournisseur->tele_agence.'". ';
      }
      if ($ancienfournisseur->tele_siege != $fournisseur->tele_siege) {
       $comment .= 'Tele_siege a été modifié de "'.$ancienfournisseur->tele_siege.'" à "'.$fournisseur->tele_siege.'". ';
      }
     
      
      if (!empty($comment)) {
          $comment = trim($comment); // Remove leading/trailing spaces
          $comment = ucfirst($comment); // Capitalize the first letter
          $comment .= ' pour ' . $fournisseur->nom_four ;
        
      } else {
          $comment = 'Aucune modification effectuée pour ' . $fournisseur->nom_four ;
      }
 
      // Enregistrer les données dans l'historique
      $historique = new Historique();
      $historique->modified_at = now();
      $historique->modified_by = $data->nom . ' ' .  $data->prenom;
      $historique->type_modif = 'Update';
      $historique->aqui = 'fournisseur';
      $historique->comment = $comment;
      
      $historique->save();
      return redirect()->route('fournisseur',compact('data'))->with('success', 'Fournisseur modifier avec succés ');


    }

    public function search(Request $request){
      $data = array();
      if(Session::has('loginId')){
      $data = User::where('id','=',Session::get('loginId'))->first();
      }
       $get_name=$request->fourni_search;
      $fournisseur = Fournisseur::where('nom_four','like','%'. $get_name.'%')
      ->orwhere('responsable','like','%'. $get_name.'%')
      ->get();
  
  
   return view('search_fourni', compact('data','fournisseur'));
    }
    
}
