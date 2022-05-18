<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Service;
use App\Models\State;
use App\Models\User;

use function PHPUnit\Framework\at;

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
        'start_date' => 'datetime'
    ];


    public function services()
    {
        return $this->belongsToMany(Service::class, "incident_service");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
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

    public static function hasNoOpenIncident()
    {
        $result = DB::table('incidents')
            ->select('incidents.end_date')
            ->whereNull('incidents.end_date')
            ->get();

        return  $result->count() == 0;


    }

    public function incidentOpenSince()
    {
        $start_date = $this->start_date;
        $result = Carbon::now()->diffInHours($start_date);
        return $result;
    }

    public function incidentLengthInHour()
    {
        $start_date = $this->start_date;
        $end_date = $this->end_date;
        $incidents = Carbon::parse($end_date);
        $result = $incidents->diffInHours($start_date);
        return $result;
    }

    public function incidentLengthIneDays()
    {
        $start_date = $this->start_date;
        $end_date = $this->end_date;
        $incidents = Carbon::parse($end_date);
        $result = $incidents->diffInDays($start_date);
        return $result;
    }

    // public static function time()
    // {
    //     $cur_time = Carbon::now()->format('Y/m/d H:i:s');
    //     echo "Date et heure actuelle: $cur_time";
    // }

    public static function show_historic()
        {
            $incidents = Incident::all();

            return view('home.incidents', ['incidents' => $incidents]);
        }


    public static function get_Uptime() {

        $currentTime = Carbon::now();
        $threeMonthsAgo = Carbon::now()->subDays(90);
        $totalTime = $currentTime->diffInMinutes($threeMonthsAgo);
        $totalDownTime = 0;
        $downTime = 0;


        $incidents = Incident::orderBy('start_date', 'ASC')->get() ;

                                                                                        //aller chercher tout les incidents et les classer par start_date ascendant,
        if(count($incidents) > 0) {
        $refIncident = $incidents->first();                                             //aller chercher le tout premier incident cree et en faire la reference ( refIncident )
        $refIncidentStart = Carbon::parse($refIncident->start_date);
        if(!$refIncident->end_date){
            $refIncidentEnd = Carbon::now();
        }else{
            $refIncidentEnd = Carbon::parse($refIncident->end_date);
        }
        $downtime = $refIncidentEnd->diffInMinutes($refIncidentStart);
        $totalDownTime += $downtime;                                                    //Ajouter le downtime de la reference au totalDownTime

        foreach($incidents as $incident){
            if($incident->id == $refIncident->id){                                      //Skipper le refIncident dans l'iteration puisque deja ajouter au downtime
                continue;
            }

            $curIncidentStart = Carbon::parse($incident->start_date);                   //curIncident pour current Incident de l'iteration
            if(!$incident->end_date){
                $curIncidentEnd = Carbon::now();
            }else{
                $curIncidentEnd = Carbon::parse($incident->end_date);
            }

            if(($refIncidentEnd->diffInMinutes($curIncidentStart)) > 0){                // Si le debut de curIncident est avant la fin de refIncident == overlap
                if($curIncidentEnd->diffInMinutes($refIncidentEnd) < 0){                // Si la fin de curIncident est avant la fin de refIncident == complete overlap, completement a l'interieur de refIncident
                    continue;                                                           // On ajoute rien au downtime vue que refIncident est deja dans le downtime
                }
            else{
                $totalDownTime += $curIncidentEnd->diffInMinutes($refIncidentEnd);
                $refIncidentStart = $curIncidentStart;                                      //fait du curIncident le nouvel refIncident
                $refIncidentEnd = $curIncidentEnd;                                          //le debut de curIncident est a l'interieur de refIncident, on fait juste calculer la difference entre fin refIncident et fin curIncident
                }
            }
            }                   // fin du foreach incidents

        }
            $totalUpTime = (($totalTime - $totalDownTime)/ $totalTime) * 100 ;

            return round($totalUpTime, 2);
        }



}
