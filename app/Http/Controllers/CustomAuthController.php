<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use  App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use  App\Mail\ResetMail;

class CustomAuthController extends Controller
{
    public function pass(){
        return view('newpass');
    }
   // interface d'erreur 
   public function error(){
      return view('error');
   }
   //interface de login
   public function login(){

    return view('login');
   }
//interface de reset
   public function resetPage(){
        return view('resetpass');
   }
   public function newpass(Request $request)
   {
       $request->validate([
           'email' => ['required', 'string'],
           'password' => ['required'],
           'passwordNew' => ['required'],
       ]);
   
       $user = User::where('email', $request->email)->first();
   
       if ($user) {
           if ($request->password !== $request->passwordNew) {
               return redirect()->back()->with('fail', 'Les deux mots de passe ne correspondent pas');
           } else {
               $request->session()->put('loginId', $user->id);
               return redirect('dashboard');
           }
       } else {
           return redirect()->back()->with('fail', 'Email n\'existe pas')->withInput();
       }
   }
   

//mail de reset de password
   public function sendMail(Request $request){
    $request->validate([
        'email' => ['required', 'string'],
     ]);
     $user = User::where('email','=',$request->email)->first();

    if($user){
        $user = [ 'email'=> $user->email,  'nom' =>$user->nom,  'prenom' =>$user->prenom];
        Mail::to($user['email'])->send(new ResetMail($user));
        return view('verifier');
    } else{
        return back()->with('fail','Email n\'existe pas');
    }
    
   }



// fonction pour controller login
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

  
  // pour controller logout 
  public function logout(){
   if(Session::has('loginId')){
      Session::pull('loginId');
      return redirect('login');
   }
  }

  //pour afficher le profil
  public function profile(){
   $data = array();
      if(Session::has('loginId')){
         $data = User::where('id','=',Session::get('loginId'))->first();
      }
      return view('profile', compact('data'));
  }
   
  //pour faire l update du profil
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



//pour afficher l interface des utilisateurs
public function table(){
   $data = array();
   if(Session::has('loginId')){
      $data = User::where('id','=',Session::get('loginId'))->first();
   }
   
   $utilisateur = array();
   $utilisateur = User::all();
   return view('utilisateur', compact('data','utilisateur'));
}
// fonction de recherche dans interface des utilisateurs



public function search(Request $request){
    $data = array();
    if(Session::has('loginId')){
    $data = User::where('id','=',Session::get('loginId'))->first();
    }
     $get_name=$request->user_search;
    $utilisateur = User::where('nom','like','%'. $get_name.'%')
    ->orwhere('profil','like','%'. $get_name.'%')
    ->get();


 return view('search_user', compact('data','utilisateur'));

}

// verifier si l email existe deja 
public function checkEmail( $email)
{
    $existingUser = User::where('email', $email)->exists();
    return response()->json(['exists' => $existingUser]);
}

//ajouter un utilisateur
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

        $data = array();
         if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
          }
         $historique = new Historique();
         $historique->modified_at = now();
         $historique->modified_by = $data->nom . ' ' . $data->prenom; 
         $historique->type_modif = 'Create';
         $historique->aqui = 'utilisateur';
         $historique->comment = 'Ajout d\'un nouveau utilisateur : '. $utilisateur->nom. ' ' . $utilisateur->prenom;
         $historique->save();

        return redirect()->route('utilisateur')->with('success', 'Utilisateur ajouté avec succès.');

}

// fonction pour supprimer un utilisateur
public function delete(Request $request, $id){
   $data = array();
   if(Session::has('loginId')){
       $data = User::where('id','=',Session::get('loginId'))->first();
   }

   $utilisateur = User::find($id);
   if (!empty($data) && Hash::check($request->input('password'), $data->password)) {
       // Enregistrer les données dans l'historique
       $historique = new Historique();
       $historique->modified_at = now();
       $historique->modified_by = $data->nom . ' ' .  $data->prenom;
       $historique->type_modif = 'Delete';
       $historique->aqui = 'utilisateur';
       $historique->comment = 'A supprimé un utilisateur ';
       
       $historique->save();

       

       // Supprimer l'utilisateur
       $utilisateur->delete();

       return redirect()->route('utilisateur')->with('success', 'Utilisateur supprimé avec succès.');
   } else {
      $historique = new Historique();
      $historique->modified_at = now();
      $historique->modified_by = $data->nom . ' ' .  $data->prenom;
      $historique->type_modif = 'Delete';
      $historique->aqui = 'utilisateur';
      $historique->comment = 'A essayé de supprimmer l\'utilisateur : '. $utilisateur->nom .' '.  $utilisateur->prenom ;
      
      $historique->save();
       return redirect()->route('utilisateur')->with('fail', 'Mot de passe incorrect. L\'utilisateur n\'a pas été supprimé.');
   }
}


// fonction pour appliquer les droits d'accés
 public function updateDroitAcces(Request $request, $userId){
   $data = array();
   if(Session::has('loginId')){
       $data = User::where('id','=',Session::get('loginId'))->first();
   }

   $user = User::find($userId);
   
   $user->accessStock = $request->has('accessStock') ? 1 : 0;
   $user->manageStock = $request->has('manageStock') ? 1 : 0;
   $user->manageUsers = $request->has('manageUsers') ? 1 : 0;
   $user->manageSuppliers = $request->has('manageSuppliers') ? 1 : 0;
   
    $user->save();
    $historique = new Historique();
    $historique->modified_at = now();
    $historique->modified_by = $data->nom . ' ' .  $data->prenom;
    $historique->type_modif = 'Update';
    $historique->aqui = 'utilisateur';
    $historique->comment = 'A essayé de supprimmer l\'utilisateur : '. $user->nom .' '.  $user->prenom ;
    return redirect()->route('utilisateur')->with('success', 'Done');

 }

 // fonction pour update des données d'un utilisateur
 public function edit(Request $request, $id)
 {
   $data = array();
   if(Session::has('loginId')){
     $data = User::where('id','=',Session::get('loginId'))->first();
   }
     $ancienUser = User::find($id);
    
     $user = User::find($id);
     $user->profil = $request->input('profil');
     $user->nom = $request->input('nom');
     $user->prenom = $request->input('prenom');
     $user->username = $request->input('username');
     $user->email = $request->input('email');
     $user->fonction = $request->input('fonction');
     $user->site = $request->input('site');
     $user->region = $request->input('region');
     $user->direction = $request->input('direction');
     $user->save();
     $modifications = array();
     $ancienUser->refresh(); 
     $comment = '';
     if ($ancienUser->profil != $user->profil) {
         $comment .= 'Profil a été modifié de "'.$ancienUser->profil.'" à "'.$user->profil.'". ';
     }
     
     
     if ($ancienUser->nom != $user->nom) {
         $comment .= 'Nom a été modifié de "'.$ancienUser->nom.'" à "'.$user->nom.'". ';
     }
     
     if ($ancienUser->prenom != $user->prenom) {
         $comment .= 'Prenom a été modifié de "'.$ancienUser->prenom.'" à "'.$user->prenom.'". ';
     }
     
     if ($ancienUser->Region != $user->Region) {
         $comment .= 'Region a été modifié de "'.$ancienUser->Region.'" à "'.$user->Region.'". ';
     }
     if ($ancienUser->Site != $user->Site) {
      $comment .= 'Site a été modifié de "'.$ancienUser->Site.'" à "'.$user->Site.'". ';
     }
     if ($ancienUser->Fonction != $user->Fonction) {
         $comment .= 'Fonction a été modifié de "'.$ancienUser->Fonction.'" à "'.$user->Fonction.'". ';
     }
   
     if ($ancienUser->Direction != $user->Direction) {
         $comment .= 'Direction a été modifié de "'.$ancienUser->Direction.'" à "'.$user->Direction.'". ';
     }
     
     if (!empty($comment)) {
         $comment = trim($comment); // Remove leading/trailing spaces
         $comment = ucfirst($comment); // Capitalize the first letter
         $comment .= ' pour ' . $user->nom . ' '.$user->prenom.".";
       
     } else {
         $comment = 'Aucune modification effectuée pour ' . $user->nom . ' '.$user->prenom.".";
     }

     // Enregistrer les données dans l'historique
     $historique = new Historique();
     $historique->modified_at = now();
     $historique->modified_by = $data->nom . ' ' .  $data->prenom;
     $historique->type_modif = 'Update';
     $historique->aqui = 'utilisateur';
     $historique->comment = $comment;
     
     $historique->save();
 
     return redirect()->route('utilisateur',compact('data'))->with('success', 'Utilisateur modifié avec succès');
 }


// update password

 public function updatePassword(Request $request){
   $userID = Session::get('loginId');

   $user= User::find($userID);
   $request->validate([
      'currentPassword' => 'required',
      'newPassword' => 'required',
      'renewPassword' => 'required',
  ]);
  
   $currentPassword = $request->input('currentPassword');
   $newPassword = $request->input('newPassword');
   $renewPassword = $request->input('renewPassword');

   // Vérifier si les mots de passe saisis correspondent
   if ($newPassword !== $renewPassword) {
      return back()->with('error', 'Les nouveaux mots de passe ne correspondent pas');
   }
    // Vérifier si le mot de passe actuel correspond au mot de passe hashé dans la base de données
    if (!Hash::check($currentPassword, $user->password)) {
      return back()->with('error', 'Le mot de passe actuel est incorrect');
  }

  $user->password =Hash::make($newPassword);
  $user->save();

  return redirect()->route('profile')->with('success', 'Mot de passe mis à jour avec succès');



 }

}
