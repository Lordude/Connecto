<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();

        return view('admin.services.index', ['states' => $states]);
    }

    // public function create()
    // {
    //     return view('admin.states.create');
    // }

    // public function edit($id)
    // {
    //     $state = State::findOrFail($id);

    //     return view('admin.states.edit', ['service' => $state]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $state = State::findOrFail($id);

    //     $state->name = $request->name;

    //     $state->save();

    //     return redirect()->route('admin.states.index')->with('success', 'L\état a été créé ! ');

    // }

    // public function store(Request $request)
    // {
    //     $state = new State;

    //     $state->name = $request->name;

    //     $state->save();

    //     return redirect()->route('admin.states.index')->with('success', 'L\état a été créé ! ');

    // }

}
