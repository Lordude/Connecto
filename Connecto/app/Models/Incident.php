<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\State;
use App\Models\User;

class Incident extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'commentary',
        'start_date',
        'end_date',
        'user_id',
        'state_id',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
    ];


    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function states()
    {
        return $this->belongsToMany(State::class);
    }
    public function get_state_id($state_id)
    {
        $result = DB::table('incidents')
            ->join('states', 'incidents.state_id', '=', 'states.id')
            ->select('states')
            ->where('state_id', '=', $state_id)
            ->get();

        if ($result->count()) {
            return $result;
        } else {
            $result = DB::table('states')->where('states.id', '=', '1')->select('states.name')->get();
            return $result;
        }
    }

    public function adminCreateIncident($user_id)
    {
        $result = DB::table('incidents')
            ->join('users', 'incidents.user_id', '=', 'users.id')
            ->select('users.first_name', 'users.last_name')
            ->where('users.id', '=', $user_id)
            ->get();

        if ($result->count()) {
            return $result;
        } else {
            $result = DB::table('users')->where('users.id', '=', '1')->select('users.first_name', 'users.last_name')->get();
            return $result;
        }
    }

    public function incidentOpenSince()
    {
        $start_date = $this->created_at;
        $result = Carbon::now()->diffInHours($start_date);
        return $result;
    }
}
