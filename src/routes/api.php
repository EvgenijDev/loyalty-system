<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API works'
    ]);
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/send-email-code', [AuthController::class, 'sendEmailCode']);

Route::post('/verify-email-code', [AuthController::class, 'verifyEmailCode']);

Route::post('/register-with-email', [AuthController::class, 'registerWithEmail']);
