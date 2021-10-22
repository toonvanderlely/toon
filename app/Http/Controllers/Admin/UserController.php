<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')
                ->with(compact('users'));
    }

    public function create(Request $request)
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = new User();
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')
                ->with(compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6'
        ]);

        $user->name = $request->name; 
        $user->email = $request->email;
        if($user->password != null)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
