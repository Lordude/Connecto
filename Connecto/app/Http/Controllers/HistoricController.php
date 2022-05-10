<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Incident;
use App\Models\Service;
use App\Models\State;
use App\Models\User;

class HistoricController extends Controller
{
    public function index() {
        $incidents = Incident::orderBy('start_date', 'desc')->get();
        $services = Service::all();
        $states = State::all();
        $users = User::all();

        return view('home.historic.index',
        ['incidents' => $incidents],
        ['services' => $services],
        ['states' => $states],
        ['users' => $users]
    );
    }


}