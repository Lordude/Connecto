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

        $report = $request->validate([

            'name' => 'required|unique:posts|max:50',
            'email' => 'required',
            'detail' => 'required',
            'date' => 'required',
            'frequent_issue_id' => 'required',

        ]);
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

