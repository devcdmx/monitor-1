<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\API\AppAPIAuthenticationController;
use App\Http\Controllers\API\ChatRoomController;
use App\Http\Controllers\API\HealthcareProfessionalController;




Route::post('/token', 'AuthController@issueToken');



// Rutas públicas
Route::post('token/create', [AppAPIAuthenticationController::class, 'login'])->name('login');
Route::post('token/register', [AppAPIAuthenticationController::class, 'register']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('token/logout', [AppAPIAuthenticationController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('chat_room', ChatRoomController::class);
    Route::apiResource('healthcare_professionals', HealthcareProfessionalController::class);
});

/*

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();


    
});

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

*/