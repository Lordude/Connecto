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
    
public function create()
{
    return view('admin.reports_services.index', [
        'reports' => new Report_Service,
        'services' => Service::all(),
       
    ]);
}
public function store(Request $request)
{
   $report_service = new Report_Service;
   $report_service->detail = $request->detail;
   $report_service->created_at = now();
   $report_service->save();

   $report_service->services()->sync($request->services);
    // dd($request->services);

   $report_service->save();

    
}

public function edit($id)
{
   $report_service = Report_Service::findOrFail($id);
    $services = Service::all();
   $report_service_services =$report_service->services->pluck('id')->toArray();
    $states = State::all();

    return view('admin.report_services.edit', [
        'Report_Service' =>$report_service,
        'services' => $services,
        'Report_Service_services' =>$report_service_services,
       
    ]);
}

public function update(Request $request, $id)
{
   $report_service = Report_Service::findOrFail($id);
   $report_service->detail = $request->detail;
   
    
   $report_service->save();
   
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
