<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Incident;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date_hired',
        'role_id'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function roles()
    {
        return $this->hasOne(Role::class);
    }



//pour l'affichage du compte de l'admin
    public static function getUserInfo($email)
    {
        $resultUser = DB::table('users')
        ->where("email", '=', $email)
        ->first();

        return $resultUser; 
    }

    public function getUserRole($role_id)
    {
        $userRole = DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.role_id')
        ->where("roles.id", '=', $role_id)
        ->get();

        return $userRole;
    }

//pour la modification du mot de passe de l'admin
    public static function UpdatePSW($email, $newPassword)
    {
         DB::table('users')
        ->where("email", '=', $email)
        ->update(["password" => Hash::make($newPassword)]);
    }
}
