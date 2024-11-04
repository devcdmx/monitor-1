<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';


Route::post('/login', function () {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return Response([
            'message' => 'Successful login!'
        ], 200);
    }

    return Response([
        'message' => 'Mismatch email and password!'
    ], 401);
});