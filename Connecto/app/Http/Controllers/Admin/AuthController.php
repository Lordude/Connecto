<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Authentification;
use App\Models\User;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $authentification = new Authentification();
        $result = $authentification::login($request->email, $request->psw);
        
        if($result){
            $resultRoleId = Authentification::getRole($request->email);
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

    public function show(Request $request){
        $resultUser = User::getUserInfo($request->session()->get("emailUser"));

        return view("admin.accounts.MyAccount", ["resultUser"=> $resultUser]);
    }
}