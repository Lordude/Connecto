<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();

        return view('admin.incidents.index', ['incidents' => $incidents]);
    }

    public function create()
    {
        return view('admin.incidents.index', [
            'product' => new Product,
        ]);
    }

    public function store(Request $request)
    {

        $incident = new Incident;

        $validated = $request->validated();

        $incident->service = $validated['service'];
        $incident->state = $validated['state'];
        $incident->description = $validated['description'];

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
