<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Report;



class ReportService extends Model

{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'report_id',
        'service_id',
        'created_at',
        'updated_at',
        
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'date',
    ];

    
    public function services()
    {
        return $this->belongsToMany(Service::class);

    }
    public function reports()
    {
        return $this->hasOne(Report::class);
    
    }

    public function reports_services()
    {
        return $this->hasOne(ReportService::class);
    }


    public function get_report_id($report_id)
    {
        $result = DB::table('reports')
        ->join('reports', 'reports_services.report_id', '=', 'report.id')
        ->select('reports')
        ->where('report_id', '=', $report_id)
        ->get();

        if($result->count()){
            return $result;
        }
    }

    
    public function get_service_id($service_id)
    {
            $result = DB::table('services')
                        ->join('report_service', 'services.id', '=', 'report_service.service_id')
                        ->select('reports.detail')
                        ->where('service_id', '=', $service_id)
                        ->get();

        if($result->count()){
            return $result;
      
        }

    }
    public function get_report_sub_hours($report_id)
    {
        $reports = Report::where('report_id', 'active')
        ->where( 'created_at', '>', Carbon::now()->subHours(24))
        ->get();

    }
}


