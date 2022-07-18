<?php

use App\Controllers\Api\AuthController;
use App\Route;

return [
    Route::view('', 'home'),
    Route::view('login', 'login'),
    Route::view('register', 'register'),
    Route::post('logout', [AuthController::class, 'logout']),
        // ->middleware('auth'),

    ...require('teacher.php'),
    ...require('admin.php'),
    ...require('api.php'),

];
