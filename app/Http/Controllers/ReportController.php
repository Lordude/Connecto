<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;
use App\Models\ReportService;
use App\Models\FrequentIssue;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
       
        $reports = Report::all();


            $reports = Report::whereBetween('created_at', [Carbon::now()->subDays(90), Carbon::now()])
            ->orderBy('date', 'desc')
            ->get();



        $services = Service::all();
        $frequent_issues = FrequentIssue::all();
        $reports_services = ReportService::all();
        $data = ReportService::join('services', 'services.id', '=', 'report_service.service_id')
                    ->join('reports', 'reports.id', '=', 'report_service.report_id')
                    ->get([ 'services.name', 'reports.detail']);


        return view (
        'admin.reports_services.index',
         [ 'data' => $data,
        'reports'=> $reports,
        'reports_services'=> $reports_services,
        'frequent_issues'=> $frequent_issues,
        'services'=> $services]
    );


        }




    }

    public function show($id)
    {
        $reports = Report::findOrFail($id);

        return view('home.reports.show', [
            'report' => $reports,
            'report_options' => $reports->report_options()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reports = new Report;

        return view(
            'home.reports.create',
            ['report' => $reports],
            ['report_service' => array()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $report = Report::create($request->validate([

            'name' => 'required|max:50',
            'email' => 'required',
            'detail' => 'required',
            'date' => 'required',
            'frequent_issue_id' => 'required',

        ]));
         // The blog post is valid...

        $report->services()->sync($request->services);

        return redirect()->route('home')->withSuccess('Le signalement a été créée');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reports = Report::findOrFail($id);

        return view('home.reports.edit', ['Reports' => $reports]);
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

        return redirect()->route('home.reports.index');
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->save();
    }
}

