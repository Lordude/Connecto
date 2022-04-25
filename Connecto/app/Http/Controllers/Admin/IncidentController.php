<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Service;
use App\Models\State;
use App\Models\User;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();
        $services = Service::all();
        $states = State::all();
        $users = User::all();

        return view(
            'admin.incidents.index',
            ['incidents' => $incidents],
            ['services' => $services],
            ['states' => $states],
            ['users' => $users]
        );
    }
    public function show($id)
    {
        $incident = Incident::findOrFail($id);

        return view('admin.incidents.show', [
            'incident' => $incident,
            'services' => $incident->services()->get()
        ]);
    }

    public function create()
    {
        return view('admin.incidents.index', [
            'incidents' => new Incident,
            'services' => Service::all(),
            'states' => State::all(),
            'users' => User::all(),
            'incident_service' => array(),
        ]);
    }

    public function store(Request $request)
    {
        $incident = new Incident;
        $incident->commentary = $request->commentary;
        $incident->start_date = now();
        $incident->user_id = User::first()->id;
        $incident->state_id = $request->state;
        $incident->save();

        $incident->services()->sync($request->services);
        // dd($request->services);

        $incident->save();

        return redirect()->route('admin.incidents.index')->with('success', 'L\'incident a été créé!');
    }

    public function edit($id)
    {
        $incident = Incident::findOrFail($id);
        $services = Service::all();
        $incident_services = $incident->services->pluck('id')->toArray();
        $states = State::all();

        return view('admin.incidents.edit', [
            'incident' => $incident,
            'services' => $services,
            'incident_services' => $incident_services,
            'states' => $states,
        ]);
    }

    public function update(Request $request, $id)
    {
        $incident = Incident::findOrFail($id);
        $incident->commentary = $request->commentary;
        $incident->user_id = User::first()->id;
        $incident->state_id = $request->state;
        $incident->save();
        // dd($request->state);

        return redirect()->route('admin.incidents.index')->with('success', 'L\'incident a été modifié!');
    }
}
