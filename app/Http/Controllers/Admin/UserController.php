<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('web.admin.user.index_user', ['user' => $user]);
    }


    public function create()
    {
        return view('web.admin.user.create_user');
    }


    public function store(UserRequest $request)
    {
        $data = $request->all();
        User::create($data);
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }


    public function show(User $user)
    {
        return view('web.admin.user.show_user', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('web.admin.user.edit_user', ['user' => $user]);
    }


    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        $user->update($data);
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
