<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validate the user
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        // Login the user
        auth()->login($user);

        // Redirect the user
        return redirect()->route('home');
    }
}
