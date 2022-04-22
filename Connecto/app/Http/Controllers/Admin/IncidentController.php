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
        $incident->start_date = $request->date;
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
        $selected_services = $incident->services->pluck('id')->toArray();
        $states = State::all();
        $selected_states = $incident->states->pluck('id')->toArray();

        return view('admin.incidents.edit', [
            'incident' => $incident,
            'services' => $services,
            'selected_services' => $selected_services,
            'states' => $states,
            'selected_states' => $selected_states,
        ]);
    }

    public function update(Request $request, $id)
    {
        $incident = Incident::findOrFail($id);
        //a modifier
        $incident->commentary = $request->commentary;
        $incident->start_date = $request->start_date;
        $incident->end_date = $request->end_date;
        $incident->services()->sync($request->services);
        $incident->categories()->sync($request->categories);
        $incident->users()->sync($request->users);

        $incident->save();

        return redirect()->route('admin.incidents.index')->with('success', 'L\'incident a été modifié!');
    }
}
