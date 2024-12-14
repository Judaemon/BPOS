<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return Inertia::render('UsersPage', [
            'users' => $users
        ]);
    }

    // public function create()
    // {
    //     return Inertia::render('Users/Create');
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     User::create([
    //         'name' => $validated['name'],
    //         'email' => $validated['email'],
    //         'password' => bcrypt($validated['password']),
    //     ]);

    //     return redirect()->route('users.index')->with('success', 'User created successfully.');
    // }

    // public function show(User $user)
    // {
    //     return Inertia::render('Users/Show', ['user' => $user]);
    // }

    // public function edit(User $user)
    // {
    //     return Inertia::render('Users/Edit', ['user' => $user]);
    // }

    // public function update(Request $request, User $user)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //     ]);

    //     $user->update($validated);

    //     return redirect()->route('users.index')->with('success', 'User updated successfully.');
    // }
}
