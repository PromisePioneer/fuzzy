<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }

    public function data(Request $request)
    {
        $per_page = $request->input('per_page', 10);
        return response()->json(User::paginate($per_page), 200);
    }

    public function store(UserRequest $request)
    {
        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make('password')
        ]);

        return response()->json($users, 200);
    }

    public function edit(User $user)
    {
        return response()->json($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        return response()->json($user->delete(), 200);
    }
}
