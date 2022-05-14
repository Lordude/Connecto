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
        //affichage seulement les incidents des 30 derniers jours
        $from = (new Carbon)->subDays(30)->startOfDay()->toDateString();
        $to = Carbon::now();

        $incidents = Incident::whereBetween('start_date', [$from, $to])->orderBy('start_date', 'desc')->get();
        $services = Service::all();
        $states = State::all();
        $users = User::all();

        return view(
            'admin.incidents.index',
            [
                'incidents' => $incidents,
                'services' => $services,
                'states' => $states,
                'users' => $users
            ]
        );
    }

    public function show($id)
    {
        $incident = Incident::findOrFail($id);

        return view('admin.incidents.show', [
            'incident' => $incident,
            'services' => $incident->services()->get(),
            'states' => $incident->states()->get(),
            // 'start_date' => Carbon::now()
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
            'services' => 'required',
            'start_date' => 'required',
            'emailUser' => 'required',
        ]);

        $incident = new Incident;

        $incident->start_date = $validated['start_date'];
        $incident->commentary = $request->commentary;
        $incident->user_id = $validated['emailUser'];
        $incident->state_id = $validated['state'];

        $incident->save();

        $incident->services()->sync($validated['services']);

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
        // $validated = $request->validate([
        //     'state' => 'required',
        // ]);

        $incident = Incident::findOrFail($id);
        $incident->commentary = $request->commentary;
        // $incident->start_date = $request->start_date;
        $incident->state_id = $request->state;
        if ($incident->state_id == 1) {
            $incident->end_date = now();
        }
        $incident->save();
        return redirect()->route('admin.incidents.index')->with('success', 'L\'incident a été modifié!');
    }
}
