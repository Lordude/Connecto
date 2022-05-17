<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Incident;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $incidents = Incident::all();

        return view('home.index', ['services' => $services, 'incidents' => $incidents]);
    }

}
