<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Service;
use App\Models\State;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();
        $states = State::all();
        $services = Service::all();

        return view(
            'admin.incidents.index',
            ['incidents' => $incidents],
            ['services' => $services],
            ['states' => $states]
        );
    }
    public function show($id)
    {
        $incident = Incident::findOrFail($id);

        return view('admin.incidents.show', [
            'incident' => $incident,
            'services' => $incident->service()->get()
        ]);
    }

    public function create()
    {
        return view('admin.incidents.index', [
            'incidents' => new Incident,
            'services' => Service::all(),
            'states' => State::all(),
            'incident_service' => array(),
        ]);
    }

    public function store(Request $request)
    {

        $incident = new Incident;
        $incident->description = $request->description;
        $incident->start_date = $request->start_date;
        $incident->end_date = $request->end_date;
        $incident->save();


        $incident->services()->sync($request->services);
        $incident->states()->sync($request->categories);

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

        $incident->description = $request->description;
        $incident->start_date = $request->start_date;
        $incident->end_date = $request->end_date;
        $incident->services()->sync($request->services);
        $incident->categories()->sync($request->categories);

        $incident->save();

        return redirect()->route('admin.incidents.index')->with('success', 'L\'incident a été modifié!');
    }
}
