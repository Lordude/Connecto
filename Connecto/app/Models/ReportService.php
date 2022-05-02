@@ -7,11 +7,14 @@
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Report;
use Carbon\Carbon;



class ReportService extends Model



{
    use HasFactory;

@ -55,6 +58,12 @@ public function reports_services()
    }


    public function report()
    {
        return $this->hasOne(Report::class);
    }


    public function get_report_id($report_id)
    {
        $result = DB::table('reports')
@ -79,17 +88,13 @@ public function get_service_id($service_id)

        if($result->count()){
            return $result;
      
        }

        }
    }
    public function get_report_sub_hours($report_id)
    {
        $reports = Report::where('report_id', 'active')
        ->where( 'created_at', '>', Carbon::now()->subHours(24))
        ->get();
    


    }
}



}