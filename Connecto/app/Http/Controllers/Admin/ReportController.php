<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;

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

        return view('admin.reports.index', ['reports' => $reports]);
    }


 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reports = new Report;

        return view('admin.reports.create', ['report' => $reports]);
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
            'name' => ['required'],
        ]));

        return redirect()->route('admin.reports.index')->withSuccess('Le signalement a été créée');
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

        return view('admin.reports.edit', ['Report' => $reports]);
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

        return redirect()->route('admin.reports.index');
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);

        return view('admin.reports.show', [
            'report' => $report,
            'report_options' => $report->report_options()->get()
        ]);
    }
}
