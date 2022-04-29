<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Incident;
use App\Models\State;

class Service extends Model
{
    use HasFactory;

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }

    public function incidents()
    {
        return $this->belongsToMany(Incident::class);
    }

    public function states()
    {
        return $this->hasOne(State::class);
    }

    

    public function get_service_state()
    {

        $result = DB::table('services')
                    ->join('incident_service', 'services.id', '=', 'incident_service.service_id')
                    ->join('incidents', 'incident_service.incident_id', '=', 'incidents.id')
                    ->join('states', 'incidents.state_id', '=', 'states.id')
                    ->select('states.name')
                    ->whereNull('incidents.end_date')
                    ->where('services.id', '=', $this->id)
                    ->get();


        if ($result->count()) {
            return $result;
        } else {
            $result = DB::table('states')->where('states.id', '=', '1')->select('states.name')->get();
            return $result;
        }
    }
    public function get_service_image($service_id)
    {

        $result = DB::table('services')
            ->Join('incident_service', 'services.id', '=', 'incident_service.service_id')
            ->join('incidents', 'incident_service.incident_id', '=', 'incidents.id')
            ->join('states', 'incidents.state_id', '=', 'states.id')
            ->select('states.image')
            ->whereNull('incidents.end_date')
            ->where('services.id', '=', $service_id)
            ->get();


        if ($result->count()) {
            return $result;
        } else {
            $result = DB::table('states')->where('states.id', '=', '1')->select('states.image')->get();
            return $result;
        }
    }
    public function get_service_description($service_id)
    {
        $result = DB::table('services')
            ->join('incident_service', 'services.id', '=', 'incident_service.service_id')
            ->join('incidents', 'incident_service.incident_id', '=', 'incidents.id')
            ->join('states', 'incidents.state_id', '=', 'states.id')
            ->select('states.description')
            ->whereNull('incidents.end_date')
            ->where('services.id', '=', $service_id)
            ->get();

        if ($result->count()) {
            return $result;
        } else {
            $result = DB::table('states')->where('states.id', '=', '1')->select('states.description')->get();
            return $result;
        }
    }

    public function hasOpenIncident()
    {
        $result = DB::table('services')
            ->join('incident_service', 'services.id', '=', 'incident_service.service_id')
            ->join('incidents', 'incidents.id', '=', 'incident_service.incident_id')
            ->whereNull('incidents.end_date')
            ->where('services.id', '=', $this->id)
            ->get();

        return $result->count() > 0;
    }
}
