<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1.0.0/register', [UserController::class, 'registerUser']);

Route::post('/v1.0.0/login', [UserController::class, 'loginUser']);

Route::get('/v1.0.0/users', [AdminController::class, 'getUsers']);