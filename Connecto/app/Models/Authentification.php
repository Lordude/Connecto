<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Authentification extends Model
{
    use HasFactory;

    static function login($email, $psw) {

        $result = DB::table("users")
            ->where("email", '=', $email)
            ->where("password", '=', $psw)
            ->get();
            
            if($result->count() > 0){
                return true;
            }else{
                return false;
            }
    } 
}


