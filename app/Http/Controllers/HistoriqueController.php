<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function show(){
        $data = array();
        if(Session::has('loginId')){
          $data = User::where('id','=',Session::get('loginId'))->first();
        }

        $history = array();
        $history = Historique::all();
        return view('historique',compact('data', 'history'));
    }
}
