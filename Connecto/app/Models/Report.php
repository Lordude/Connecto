<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
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

    public function reports_services()
    {
        return $this->belongsToMany(ReportService::class);
    }

    public static function reportOpenSinceOneHour()
    {
        $Report = Report::select([
            DB::raw('HOUR(created_at) AS hour'),


        ])
            ->whereBetween('created_at', [Carbon::now()->subHours(24), Carbon::now()])
            ->get();

        $ReportByHour = [];
        foreach ($Report as $reports) {
            $ReportByHour[$reports['hour']] = $reports['count'];
        }

        ksort($ReportByHour);
        return count($ReportByHour);
    }


    public function get_report_sub_hours($report_id)
    {
        $reports = Report::where('report_id', 'active')
            ->where('created_at', '>', Carbon::now()->subHours(24))
            ->get();
    }
}
