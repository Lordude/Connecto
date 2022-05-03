<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
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

    public function get_incident_state($incident_id)
    {

        $result = DB::table('incidents')
            ->join('states', 'incidents.state_id', '=', 'states.id')
            ->select('states.name')
            ->where('incidents.id', '=', $incident_id)
            ->get();


        if ($result->count()) {
            return $result;
        } else {
            $result = DB::table('states')->where('states.id', '=', '1')->select('states.image')->get();
            return $result;
        }
    }

    public function get_incident_image($incident_id)
    {

        $result = DB::table('incidents')
            ->join('states', 'incidents.state_id', '=', 'states.id')
            ->select('states.image')
            ->where('incidents.id', '=', $incident_id)
            ->get();


        if ($result->count()) {
            return $result;
        } else {
            $result = DB::table('states')->where('states.id', '=', '1')->select('states.image')->get();
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

    public static function get_Uptime() {

        $currentTime = Carbon::now();
        $threeMonthsAgo = Carbon::now()->subDays(90);
        $downTime = 0;


        $incidents = Incident::all();

        foreach ($incidents as $incident) {
            $start = $incident->start_date;
            if($incident->end_date){
                $end = $incident->end_date;
            }else{
                $end = Carbon::now();
            }

            $total = $end - $start;
            $downTime = $downTime + $total;
        }

        $totalTime = $currentTime->diffInHours($threeMonthsAgo);

        $totalUpTime = (($totalTime - $downTime)/ $totalTime) * 100; 

        return $totalUpTime;

    }


}
