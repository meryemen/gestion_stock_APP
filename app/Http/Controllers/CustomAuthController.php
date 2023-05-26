<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use  App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;

class CustomAuthController extends Controller
{
   public function error(){
      return view('error');
   }
   public function login(){

    return view('login');
   }

   public function createNewUser()
   {
      $user = new User;
      $user->nom = 'En-najibi';
      $user->prenom = 'Meryem';
      $user->username = 'ennajime';
      $user->email = 'Meryem.ENNAJIBI@external.danone.com';
      $user->password = Hash::make('ihdadi2022');
      $user->profil= 'user';
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

  
  
  public function logout(){
   if(Session::has('loginId')){
      Session::pull('loginId');
      return redirect('login');
   }
  }

  public function profile(){
   $data = array();
      if(Session::has('loginId')){
         $data = User::where('id','=',Session::get('loginId'))->first();
      }
      return view('profile', compact('data'));
  }
   
  public function updateProfil(Request $request){
   $userID = Session::get('loginId');

   $user= User::find($userID);

   $request->validate([
      'fonction' => 'required',
      'site' => 'required',
      'region' => 'required',
      'direction' => 'required',
  ]);
  
    $user->fonction = $request->input('fonction');
    $user->site = $request->input('site');
    $user->region = $request->input('region');
    $user->direction = $request->input('direction');

    $user->save();

    return redirect()->route('profile')->with('success', 'profile updated successfuly');
}
public function stock(Request $request){
   $data = array();
   if(Session::has('loginId')){
      $data = User::where('id','=',Session::get('loginId'))->first();
   }
   return view('stock', compact('data'));
}

public function table(){
   $data = array();
   if(Session::has('loginId')){
      $data = User::where('id','=',Session::get('loginId'))->first();
   }
   
   $utilisateur = array();
   $utilisateur = User::all();
   return view('utilisateur', compact('data','utilisateur'));
}

public function createUser(){
   $data = array();
   if(Session::has('loginId')){
      $data = User::where('id','=',Session::get('loginId'))->first();
   }
   return view('userCreate', compact('data'));
}

public function search(Request $request){
    if($request->ajax()){
      $data= User::where('nom','like','%'.$request->search.'%')
      ->orwhere('prenom','like','%'.$request->search.'%')
      ->orwhere('region','like','%'.$request->search.'%')
      ->orwhere('direction','like','%'.$request->search.'%')
      ->orwhere('username','like','%'.$request->search.'%')->get();
      $output='';
      if(count($data)>0){
          $output ='
          
              <table class="table" style="table-layout: fixed; width: 100%;">
              <thead>
              <tr>
              
              <th class="text-success">Nom</th>
              <th class="text-success">Prénom</th>
              <th class="text-success">Username</th>
              <th class="text-success">Email</th>
              <th class="text-success">Fonction</th>
              <th class="text-success">Site</th>
              <th class="text-success">Region</th>
              <th class="text-success">Direction</th>
              <th class="text-success">Profil</th>
              <th class="text-success">Action</th>
              <th class="text-success">droit d accès</th>
              </tr>
              </thead>
              <tbody>';
                  foreach($data as $row){
                      $output .='
                      <tr>
                      <td>'.$row->nom.'</td>
                      <td>'.$row->prenom.'</td>
                      <td>'.$row->username.'</td>
                      <td>'.$row->email.'</td>
                      <td>'.$row->Fonction.'</td>
                      <td>'.$row->Site.'</td>
                      <td>'.$row->Region.'</td>
                      <td>'.$row->Direction.'</td>
                      <td>'.$row->profil.'</td>
                      <td class="text-overflow">
                      <a href="#editEmployeeModal" class="text-warning" ><i class="ri ri-pencil-fill"></i></a>
                      <a href="#deleteEmployeeModal" class="text-danger" ><i class="bi bi-trash"></i>
                      </a>
                    </td>
                    <td class="text-overflow">
                        <a href="#editEmployeeModal" class="text-secondary" ><i class="bi bi-gear" style="float:center"></i></a>
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
public function insert(Request $request){
   $request->validate([
            'profil' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'passwordconfirm' => 'required',
            'fonction' => 'required',
            'site' => 'required',
            'region' => 'required',
            'direction' => 'required',
           


   ]);
        $utilisateur = new User();
        $utilisateur->nom = $request->input('nom');
        $utilisateur->prenom = $request->input('prenom');
        $utilisateur->username = $request->input('username');
        $utilisateur->email = $request->input('email');
        $utilisateur->password = Hash::make($request->input('password'));
        $utilisateur->fonction = $request->input('fonction');
        $utilisateur->site = $request->input('site');
        $utilisateur->region = $request->input('region');
        $utilisateur->direction = $request->input('direction');
        $utilisateur->profil = $request->input('profil');

        
        $utilisateur->save();
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');

        $user = ['username' => $username, 'email'=>$email, 'password' => $password, 'nom' =>$nom,  'prenom' =>$prenom];
        Mail::to($user['email'])->send(new TestMail($user));

        return redirect()->route('utilisateur')->with('success', 'Utilisateur ajouté avec succès.');

}


public function delete($id){
   $data = array();
   if(Session::has('loginId')){
     $data = User::where('id','=',Session::get('loginId'))->first();
   }

   $utilisateur = User::find($id);
   $utilisateur->delete();
   return redirect()->route('utilisateur',compact('data'))->with('fail', 'utilisateur supprimer ');

 }
 public function updateDroitAcces(Request $request, $userId){
   $user = User::find($userId);
   
   $user->accessStock = $request->has('accessStock') ? 1 : 0;
   $user->manageStock = $request->has('manageStock') ? 1 : 0;
   $user->manageUsers = $request->has('manageUsers') ? 1 : 0;
   $user->manageSuppliers = $request->has('manageSuppliers') ? 1 : 0;
   
    $user->save();

    return redirect()->route('utilisateur')->with('success', 'Done');

 }


 public function edit(Request $request , $id){
   $data = array();
   if(Session::has('loginId')){
     $data = User::where('id','=',Session::get('loginId'))->first();
   }
   
   $utilisateur = User::find($id);
   $utilisateur->nom = $request->input('nom');
   $utilisateur->prenom = $request->input('prenom');
   $utilisateur->username = $request->input('username');
   $utilisateur->email = $request->input('email');
   $utilisateur->fonction = $request->input('fonction');
   $utilisateur->site = $request->input('site');
   $utilisateur->region = $request->input('region');
   $utilisateur->direction = $request->input('direction');
   $utilisateur->profil = $request->input('profil');


   return redirect()->route('utilisateur',compact('data'))->with('success', 'Utilisateur modifier avec succés ');
 }

}
