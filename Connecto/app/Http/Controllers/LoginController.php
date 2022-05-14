<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Authentification;
use App\Models\User;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $authentification = new Authentification();
        $result = $authentification::login($request->email, $request->psw);
        
        if($result){
            $resultRoleId = Authentification::getRole($request->email);
            Session::put("emailUser",$request->email);
            Session::put("TypeRole", $resultRoleId);
            return redirect('/admin/services')->with('logsuccess', 'connexion réussie!');
        }else{
            return redirect('/')->with('logfail', 'connexion échouée!');
        }
    }
    public function index(){
        Session::remove("emailUser");
        Session::remove("TypeRole");
        return redirect('/')->with('messagelogout', 'vous avez été déconnecté avec succès!');
    }

}
