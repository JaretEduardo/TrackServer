<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1.0.0/register', [userController::class, 'registerUser']);

Route::post('/v1.0.0/login', [userController::class, 'loginUser']);