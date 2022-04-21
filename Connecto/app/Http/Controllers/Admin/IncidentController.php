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

        return view(
            'admin.incidents.index',
            ['incidents' => $incidents]
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
            // 'selected_incidents' => Array(),
        ]);
    }

    public function store(Request $request)
    {
        // a modifier...
        $incident = new Incident;
        $service = new Service;

        $service->id = $request->id;
        // $state->id = $request->id;
        // $incident->commentary = $request->commentary;

        $incident->save();

        return redirect()->route('admin.incidents.index')->with('success', 'L\'incident a été créé!');
    }

    public function edit($id)
    {
        $incident = Incident::findOrFail($id);

        return view('admin.incidents.edit', ['incident' => $incident]);
    }

    public function update(Request $request, $id)
    {
        $incident = Incident::findOrFail($id);

        $validated = $request->validated();

        $incident->service = $validated['service'];
        $incident->state = $validated['state'];
        $incident->description = $validated['description'];

        $incident->save();

        return redirect()->route('admin.incidents.index')->with('success', 'L\'incident a été modifié!');
    }
}
