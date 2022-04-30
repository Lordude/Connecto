<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Report;
use App\Models\ReportService;

class ReportServiceController extends Controller
{ 

public function index()
{
  
    $services = Service::all();
    $reports = Report::all();
  

    return view(
        'admin.reports_services.index',
        ['reports' => $reports],
        ['services' => $services]
        
    );
}

public function show($id)
{
    $report_service = ReportService::findOrFail($id);

    return view('admin.reports_services.show', [
        'report' => $report_service,
        'services' => $report_service->services()->get()
    ]);
}
    
 
   
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Report::findOrFail($id)->delete();

        return redirect()->route('admin.reports_services.index');
    }

   
    
}
