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
        $email = User::where('email', $request->input('email'))->first();
        $password = Hash::check($request->input('password'), $email->password);

        if (!$email || !$password) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $email->createToken('api-token')->plainTextToken;

        $idRol = User::where('email', $request->input('email'))->value('rolID');

        return response()->json([
            'message' => 'Login successful',
            'RolID' => $idRol,
            'token' => $token,
        ], 200);
    }

    public function getUsers(){
        $users = User::all();

        return response()->json([
            'message' => 'Users retrieved successfully',
            'users' => $users
        ], 200);
    }
}
