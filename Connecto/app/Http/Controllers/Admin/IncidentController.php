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
}
