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
        $Authentification->email = $request->email;
        $Authentification->psw = $request->psw;
        $result = $Authentification::login($request->email, $request->psw);

        if($result){
            Session::put("emailUser",$request->email);
            return redirect('/admin/services')->with('logsuccess', 'connexion réussi mouahaha!');
        }else{
            return redirect('/')->with('logfail', 'connexion échouée!');
        }
    }
}
