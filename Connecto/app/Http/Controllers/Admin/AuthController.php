<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Authentification;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $Authentification = new Authentification();
        $result = $Authentification::login($request->email, $request->psw);
        
        if($result){
            $resultRoleId = $Authentification::getRole($request->email);
            Session::put("emailUser",$request->email);
            Session::put("TypeRole", $resultRoleId);
            return redirect('/admin/services')->with('logsuccess', 'connexion réussi mouahaha!');
        }else{
            return redirect('/')->with('logfail', 'connexion échouée!');
        }
    }

    // je n'arrive pas à personnaliser mon nom de route, je voudrais logout à la place d'index. 
    public function index(){
        Session::remove("emailUser");
        Session::remove("TypeRole");
        return redirect('/')->with('messagelogout', 'vous avez été déconnecté avec succes!');
    }
}
