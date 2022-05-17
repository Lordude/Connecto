<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

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

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        $user->save();

        return redirect()->route('superadmin.users.index')->with('success', 'Le user a été créé ! ');
    }

    public function store(Request $request)
    {
        // $user = User::create($request->validate([

        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'date_hired' => 'required',
        //     'role_id' => 'required',

        // ]));
        //  // The blog post is valid...

        // $user->services()->sync($request->services);

        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make ($request->password);
        $user->date_hired = $request->date_hired;
        $user->role_id = $request->role_id;

        $user->save();
        return redirect()->route('superadmin.users.index')->withSuccess('Le nouveau compte a été créée');

    }

    public function destroy(Request $request, $id)
    {
        User::destroy($id);

        return redirect()->route('superadmin.users.index')->with('success', 'Le compte a été supprimé.');;
    }
}

