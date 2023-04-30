<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CustomAuthController extends Controller
{
   public function login(){
    return view('login');
   }
   public function loginUser(Request $request){
      $request->validate([
         'username' => ['required', 'string'],
         'password' => ['required']
      ]);
      $user = User::where('username','=',$request->username)->first();
      if($user){
            $md5_password = md5($request->password);
            if ($md5_password === $user->password) {
            $request->session()->put('loginId',$user->id);
            return redirect('dashboard');
          }else{
            return back()->with('fail','password not matches');
         }
         
         }else{
         return back()->with('fail','This username is not registered');
      }
     

   }
   public function dashboard(Request $request){
      $data = array();
      if(Session::has('loginId')){
         $data = User::where('id','=',Session::get('loginId'))->first();
      }
      return view('dashboard', compact('data'));
  }


}
