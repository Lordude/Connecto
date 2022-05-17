<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Authentification extends Model
{
    use HasFactory;

    static function login($email, $psw) {

        $result = DB::table("users")
            ->where("email", '=', $email)
            //->where("password", '=', $psw)
            ->first();

             if(!$result == null)
             {
                if(Hash::check($psw, $result->password))
                {
                    return true;
                }
                    return false;
            //
             }else{
                 return false;
             }
    }
    
    static function getRole($email){
        $result = DB::table("users")
        ->select("role_id")
        ->where("email", '=', $email)
        ->first();

        return $result->role_id;
    }
}


