<?php

use App\Controllers\Api\AuthController;
use App\Route;

return [
    Route::view('', 'home'),
    Route::view('login', 'login'),


    //ADMIN ROUTES
    Route::view('admin', 'admin/dashboard')
        ->middleware('auth:admin'),

    //API ROUTES
    Route::post('api/login', [AuthController::class, 'login']),
    Route::post('api/logout', [AuthController::class, 'logout'])
        ->middleware('auth'),

    Route::get('api/user', [AuthController::class, 'currentUser'])
        ->middleware('auth'),
];
