<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
{
    // Validate request
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'phone_number' => 'required|string|max:20',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create the user
    User::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'],
        'password' => Hash::make($validated['password']),
        'role' => 'user',
    ]);

    return redirect('/')->with('success', 'Registration successful!');
}


}
