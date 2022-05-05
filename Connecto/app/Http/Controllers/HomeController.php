<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('home.index', ['services' => $services]);
    }

}
