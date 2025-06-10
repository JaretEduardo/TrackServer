<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function getUsers(Request $request)
    {
        $rolID = $request->input('rolID');

        $users = User::select('IDUser', 'userName', 'email', 'rolID', 'accountStatus');

        if ($rolID) {
            $users->where('rolID', $rolID);
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
}
