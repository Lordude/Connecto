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
 // $incident_service = IncidentService::all();
        return view(
            'admin.incidents.index',
            ['incidents' => $incidents],
            ['services' => $services],
            ['states' => $states],
            ['users' => $users]
              // ['incident_service' => $incident_service]
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

     /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
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
 /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'commentary' => 'required|max:255',
            // 'description' => 'required',
            // 'price' => 'required|numeric',
            // 'is_active' => 'required',
        ]);

        $incident = new Incident;

        $incident->commentary = $validated['commentary'];
        $incident->user_id = User::first()->id;
        $incident->start_date = now();
        $incident->state_id = $request->state;

        $incident->save();

        $incident->services()->sync( $request->services);

        $incident->save();

        // $incident = new Incident;
        // $incident->commentary = $request->commentary;
        // $incident->start_date = now();
        // $incident->user_id = User::first()->id;
        // $incident->state_id = $request->state;
        // $incident->save();

        // $incident->services()->sync($request->services);
        // // dd($request->services);

        // $incident->save();

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

        $incidents = Incident::table("incidents")
        ->join('incident_service', 'incidents.incident_id', '=', 'incident_service.incident_id')
        ->select('incident_id', 'service_id')
        // ->where('incidents.id', '=', 'incident_service.incident_id')
        ->get();

        $incidents->destroy($id);
        // dd($incidents);


        // foreach ($incidents as $incident) {
        //     foreach ($incident->services as $service) {
        //     }
        // }

        //    $service_id =  Service::findOrFail($id);
        //    dd($service_id);
        //     $service_id->incidents()->detach($service_id);

        // Service::destroy($service_id);
        // Incident::where('service_id', $service_id)->delete();

        // $request = Incident::find($incident_id)->delete();
        // $request->services->detach($service_id, $incident_id);

        // Incident::find($incident_id)->delete();
        // Service::find($service_id)->delete();
        return redirect()->route('admin.incidents.index')->with('success', 'Le service a été retiré de l\'incident.');
    }

}
