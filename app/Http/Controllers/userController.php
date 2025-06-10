<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'userName' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'IDUser' => random_int(100000, 999999),
            'ID' => random_int(100000, 999999),
            'userName' => $request->input('userName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rolID' => 2,
            'accountStatus' => 'active',
            'created_at' => now()
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        if ($user->accountStatus !== 'active') {
            return response()->json(['message' => 'Account is not active'], 403);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'RolID' => $user->rolID,
            'token' => $token,
        ], 200);
    }
}
