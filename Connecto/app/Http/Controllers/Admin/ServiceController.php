<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', ['services' => $services]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', ['service' => $service]);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->name = $request->name;

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Le service a été modifié ! ');
    }

    public function store(Request $request)
    {
        $service = new Service;

        $service->name = $request->name;

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Le service a été créé ! ');
    }

    public function destroy(Request $request, $id)
    {
        Service::destroy($id);

        return redirect()->route('admin.services.index')->with('success', 'Le produit a été supprimé.');;
    }

    public function deleteServiceFromIncidentService(Request $request, $id)
    {

        $service =  Service::findOrFail($id);
        $incident = $service->incidents()->whereNull('end_date')->first();
        $service->incidents()->detach($incident);

        return redirect()->route('admin.incidents.index')->with('success', 'Le service a été retiré de l\'incident.');;
    }
}
