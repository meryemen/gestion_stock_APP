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

      $fournisseur = Fournisseur::find($id_fourni);
      $fournisseur->nom_four = $nom_four;
      $fournisseur->responsable = $responsable;
      $fournisseur->email = $email;
      $fournisseur->adresse = $adresse;
      $fournisseur->tele_siege = $tele_siege;
      $fournisseur->tele_agence = $tele_agence;
      $fournisseur->save();

      return redirect()->route('fournisseur',compact('data'))->with('success', 'Fournisseur modifier avec succés ');


    }

    public function search(Request $request){
      if($request->ajax()){
        $data= Fournisseur::where('nom_four','like','%'.$request->search.'%')
        ->orwhere('responsable','like','%'.$request->search.'%')->get();
        $output='';
        if(count($data)>0){
            $output ='
            
                <table class="table" style="table-layout: fixed; width: 100%;">
                <thead>
                <tr>
                
                <th class="text-success">Fournisseur</th>
                <th class="text-success">Responsable</th>
                <th class="text-success">Email</th>
                <th class="text-success">Adresse</th>
                <th class="text-success">Téléphone-Site</th>
                <th class="text-success">Téléphone-Agence</th>
                <th class="text-success">Action</th>
                
                </tr>
                </thead>
                <tbody>';
                    foreach($data as $row){
                        $output .='
                        <tr>
                        <td>'.$row->nom_four.'</td>
                        <td>'.$row->responsable.'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->adresse.'</td>
                        <td>'.$row->tele_siege.'</td>
                        <td>'.$row->tele_agence.'</td>
                       
                        <td class="text-overflow">
                        <a href="#editEmployeeModal" class="text-warning" ><i class="ri ri-pencil-fill"></i></a>
                        <a href="#deleteEmployeeModal" class="text-danger" ><i class="bi bi-trash"></i>
                        </a>
                      </td>
                     
                        </tr>
                        
                        ';
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
