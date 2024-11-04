<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::post('token/create', [\App\Http\Controllers\API\AppAPIAuthenticationController::class, 'login']);
Route::post('token/register', [\App\Http\Controllers\API\AppAPIAuthenticationController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('token/logout', [\App\Http\Controllers\API\AppAPIAuthenticationController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('chat_room', \App\Http\Controllers\API\ChatRoomController::class);
});



/*

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

*/