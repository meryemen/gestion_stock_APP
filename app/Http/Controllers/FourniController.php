<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
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

    public function ajouter(Request $request){
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

      $fournisseur = new Fournisseur();
      $fournisseur->nom_four = $nom_four;
      $fournisseur->responsable = $responsable;
      $fournisseur->email = $email;
      $fournisseur->adresse = $adresse;
      $fournisseur->tele_siege = $tele_siege;
      $fournisseur->tele_agence = $tele_agence;
      $fournisseur->save();

      return redirect()->route('fournisseur',compact('data'))->with('success', 'Fournisseur ajouté ');


    }

    public function delete($id_fourni){
      $data = array();
      if(Session::has('loginId')){
        $data = User::where('id','=',Session::get('loginId'))->first();
      }

      $fournisseur = Fournisseur::find($id_fourni);
      $fournisseur->delete();
      return redirect()->route('fournisseur',compact('data'))->with('fail', 'Fournisseur supprimer ');

    }
    
}
