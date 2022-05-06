<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;
use App\Models\ReportService;

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

        // return view('admin.reports.index', [
        //     'report' => new Report,
        //     'services' => Service::all(),
        //     'states' => State::all(),
        //     'report_service' => array(),
        // ]);
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
            'email' => ['required'],
            'detail' => ['required'],
            'date' => ['required'],
            'created_at' => ['required'],
            'frequent_issue_id' => ['required'],

        ]));
        $report->services()->sync($request->services);

        return redirect()->route('admin.services.index')->withSuccess('Le signalement a été créée');

        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'detail' => 'required',
        //     'date' => 'required',
        //     'frequent_issue_id' => 'required',
        // ]);

        // $reports = new Report;
        // $reports->name = $validated['commentary'];
        // $reports->email = $validated['email'];
        // $reports->detail = $validated['emailUser'];
        // $reports->state_id = $validated['state'];

        // $reports->save();

        // $reports->services()->sync($validated['services']);

        // $reports->save();

        // return redirect()->route('admin.reports.index')->with('success', 'Le signalement a été créé!');
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

