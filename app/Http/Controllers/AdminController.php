<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Assignments;

class AdminController extends Controller
{
    public function getUsers(Request $request)
    {
        $rolID = $request->input('rolID');
        $accountStatus = $request->input('accountStatus');

        $users = User::select('IDUser', 'userName', 'email', 'rolID', 'accountStatus');

        if ($rolID) {
            $users->where('rolID', $rolID);
        }

        if ($accountStatus) {
            $users->where('accountStatus', $accountStatus);
        }

        $users = $users->get();

        return response()->json([
            'message' => 'Users retrieved successfully',
            'users' => $users
        ], 200);
    }

    public function updateStatus(Request $request)
    {
        $email = $request->input('email');
        $newStatus = $request->input('accountStatus');

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->accountStatus = $newStatus;
        $user->save();

        return response()->json([
            'message' => 'User status updated successfully',
            'status' => $user->accountStatus
        ], 200);
    }

    public function addUsers(Request $request)
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
            'rolID' => $request->input('rolID'),
            'accountStatus' => 'active',
            'created_at' => now()
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }

    public function assignOrders(Request $request)
    {
        $ID = $request->input('ID');
        $OrderID = $request->input('OrderID');

        if (!$ID || !$OrderID) {
            return response()->json(['message' => 'User or Orders not found'], 400);
        }

        $assignment = Assignments::create([
            'ID' => $ID,
            'orderID' => $OrderID
        ]);

        return response()->json([
            'message' => 'Orders assigned successfully'
        ], 201);
    }
}
