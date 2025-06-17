<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::middleware('auth:sanctum', 'check.admin')->group(function () {
    Route::get('/v1.0.0/admin/users', [AdminController::class, 'getUsers']);
    Route::put('/v1.0.0/admin/users/status', [AdminController::class, 'updateStatus']);
    Route::post('/v1.0.0/admin/addusers', [AdminController::class, 'addUsers']);
    Route::post('/v1.0.0/admin/assignments', [AdminController::class, 'assignOrders']);
    Route::get('/v1.0.0/admin/ordersearrings', [AdminController::class, 'getOrdersToAssign']);
    Route::put('/v1.0.0/admin/orderstatus', [AdminController::class, 'updateStatusOrder']);
});

Route::post('/v1.0.0/auth/register', [UserController::class, 'registerUser']);

Route::post('/v1.0.0/auth/login', [UserController::class, 'loginUser']);