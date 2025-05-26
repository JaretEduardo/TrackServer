<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function registerUser(Request $request)
    {
        $user = User::create([
            'ID' => $request->input('ID'),
            'userName' => $request->input('userName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rolID' => $request->input('rolID'),
            'rolName' => $request->input('rolName'),
            'accountStatus' => 'active',
            'created_at' => now()
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
}
