<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function index() {
        $user = Auth::user()->load(['ownedCars', 'rentings']);

        return view('users.index', compact('user'));
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user) {
        abort_unless($user->is(Auth::user()), 403);

        $user->load('ownedCars');

        return view('users.show', [
            'user' => $user,
            'cars' => $user->ownedCars,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('users.index', $user)->with('success', 'Profile updated successfully.');
    }
}
