<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanqueController extends Controller
{
    public function login(){
        return view('login');
    }
    public function accounts($data){
        if($data =='accounts'){
            $data =1;
            return view('admin.admin', compact('data'));
        }
    }
    public function solde_banque(){
        $solde=1;
        return view('admin.admin', compact('solde'));
    }
    public function add_agents(){
        return view('admin.add_agent');
    }
    public function alter_clients_and_agents(){
        return view('admin.suppression_agent');
    }
}
