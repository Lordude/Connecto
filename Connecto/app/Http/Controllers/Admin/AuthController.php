<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    //pour montrer les info de l'Admin dans la page Mon Compte
    public function show(Request $request){
        $resultUser = User::getUserInfo($request->session()->get("emailUser"));

        return view("admin.accounts.MyAccount", ["resultUser"=> $resultUser]);
    }

    //pour changer le mot de passe de l'Admin
   public function update(Request $request){

    User::UpdatePSW($request->session()->get("emailUser"), $request->newPassword);

    return back()->with("MessageChange", "Changement du mot de passe réussi!");

    }
}
