<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Equipement;
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
 
  
}