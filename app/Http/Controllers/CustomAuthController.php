<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
   public function login(){

    return view('login');
   }

   public function createNewUser()
   {
      $user = new User;
      $user->nom = 'Ihda';
      $user->prenom = 'Driss';
      $user->username = 'ihdadi';
      $user->email = 'Driss.IHDA@external.danone.com';
      $user->password = Hash::make('ihdadi2022');
      $user->profil= 'admin';
      $user->has_access_to_user_management="1";
      $user->has_access_to_inventory_management="1";
      $user->has_access_to_view_inventory="1";
      $user->has_access_to_view_history="1";
      $user->save();
      
      return "Utilisateur créé avec succès !";
   }



   public function loginUser(Request $request){
      $request->validate([
         'username' => ['required', 'string'],
         'password' => ['required']
      ]);
      $user = User::where('username','=',$request->username)->first();
      if($user){
            if (Hash::check($request->password, $user->password)){
            $request->session()->put('loginId',$user->id);
            return redirect('dashboard');
          }else{
            return back()->with('fail','Mot de passe incorrect');
         }
         
         }else{
         return back()->with('fail','Pseudo incorrect');
   }}



   public function dashboard(Request $request){
      $data = array();
      if(Session::has('loginId')){
         $data = User::where('id','=',Session::get('loginId'))->first();
      }
      return view('dashboard', compact('data'));
  }

  public function logout(){
   if(Session::has('loginId')){
      Session::pull('loginId');
      return redirect('login');
   }
  }


}
