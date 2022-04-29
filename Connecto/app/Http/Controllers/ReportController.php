<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;






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

        return view('home.reports.index',
         ['reports' => $reports]
        );
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

        return view('home.reports.create', ['report' => $reports]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $report = new Report;

        $report->name = $request->name;
        $report->email = $request->email;
        $report->detail = $request->detail;
        $report->date = $request->date;
        $report->frequent_issues_id = $request->frequent_issues_id;

        $report->save();
        
        // $report = Report::create($request->validate([
        //     'name' => $report->name,
        //     'email' => ['required'],
        //     'detail' => ['required'],
        //     'frequent_issues_id' => ['']            
        // ]));

        return redirect()->route('home.reports.index')->withSuccess('Le signalement a été créée');
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

   
    
}
