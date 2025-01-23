<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//AUTHENTICATION
Route::post('/authenticating', [AuthController::class, 'authenticating']);
Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
Route::get('/checking-status-otp', [AuthController::class, 'checkingStatusOTP']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-management', [UserController::class, 'index']);
    Route::post('/user-management', [UserController::class, 'store']);
});
