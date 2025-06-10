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
}
