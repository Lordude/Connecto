<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('superadmin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('superadmin.users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('superadmin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;

        $user->save();

        return redirect()->route('superadmin.users.index')->with('success', 'Le user a été créé ! ');
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;

        $user->save();

        return redirect()->route('superadmin.users.index')->with('success', 'Le user a été créé ! ');
    }

    public function destroy(Request $request, $id)
    {
        User::destroy($id);

        return redirect()->route('superadmin.users.index')->with('success', 'Le produit a été supprimé.');;
    }
}

