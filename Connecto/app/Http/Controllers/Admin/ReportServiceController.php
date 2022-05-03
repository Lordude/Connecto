<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Report;
use App\Models\ReportService;


class ReportServiceController extends Controller
{ 
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        $services = Service::all();
        $reports_services = ReportService::all();
        $data = ReportService::join('services', 'services.id', '=', 'report_service.service_id')
                    ->join('reports', 'reports.id', '=', 'report_service.report_id')                   
                    ->get([ 'services.name', 'reports.detail']);


        return view (
        'admin.reports_services.index',
         [ 'data' => $data],
        ['reports'=> $reports],
        ['services'=> $services],
        ['reports_services => $reports_services']
    );
       
    
        }





public function show($id)
{
    $report_service = ReportService::findOrFail($id);

    return view('admin.report_service.show', [
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
        ReportService::findOrFail($id)->delete();

        return redirect()->route('admin.reports_services.index');
    }

      
}