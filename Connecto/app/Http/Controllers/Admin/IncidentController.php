<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
            'services' => $incident->services()->get(),
            'states' => $incident->states()->get()
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
        $validated = $request->validate([
            'state' => 'required',

        ],
        [
        'state.required' => 'Choisissez un statut!',
        ]);

        $incident = new Incident;
        $incident->commentary = $request->commentary;
        $incident->start_date = Carbon::now()->format('Y/m/d H:i:s');

        // $incident->commentary = $validated['commentary'];
        $incident->user_id = User::first()->id;
        // $incident->start_date = now();
        $incident->state_id = $validated['state'];

        $incident->save();

        $incident->services()->sync($request->services);

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
        // dd($request->state_id);
        if ($incident->state_id == 1) {
            $incident->end_date = now();
        }
        $incident->save();
        return redirect()->route('admin.incidents.index')->with('success', 'L\'incident a été modifié!');
    }

    public function destroy(Request $request, $id)
    {
        Incident::destroy($id);

        return redirect()->route('admin.incidents.index')->with('success', 'Le service a été supprimé.');;
    }



}
