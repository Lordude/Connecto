<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Report;

class ReportService.php extends Model

{
    use HasFactory;

    
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function reports()
    {
        return $this->hasOne(Report::class);
    }


    public function get_report_id($report_id)
    {
        $result = DB::table('reports')
        ->join('services', 'services.id', '=', 'report_service.service_id')
        ->whereNull('reports.end_date')
        ->where('reports.id', '=', $report_id)
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
                        ->whereNull('services.end_date')
                        ->where('services.id', '=', $service_id)
                        ->get();

        if($result->count()){
            return $result;
      
        }

    }
}

