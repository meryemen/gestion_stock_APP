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
    
}
