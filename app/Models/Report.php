<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\FrequentIssue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\ReportService;



class Report extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'detail',
        'date',
        'created_at',
        'frequent_issue_id',

    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];



    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function frequent_issue()
    {
        return $this->belongsTo(FrequentIssue::class);
    }

    public function reports_services()
    {
        return $this->belongsToMany(ReportService::class);
    }

    public static function reportOpenSince24Hour()
    {
        $Reports = Report::select([
            DB::raw('HOUR(created_at) AS hour'),
        ])
            ->whereBetween('created_at', [Carbon::now()->subHours(24), Carbon::now()])
            ->get();

        $ReportBy24Hour = 0;
        foreach ($Reports as $report) {
           
            $ReportBy24Hour = $ReportBy24Hour + 1; 
        }

        return $ReportBy24Hour;
    }


    public function get_report_sub_hours($report_id)
    {
        $reports = Report::where('report_id', 'active')
            ->where('created_at', '>', Carbon::now()->subHours(24))
            ->get();
    }
}
