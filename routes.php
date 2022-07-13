<?php

use App\Controllers\Api\AuthController;
use App\Controllers\Api\ClassController;
use App\Controllers\TeacherController;
use App\Route;

return [
    Route::view('', 'home'),
    Route::view('login', 'login'),
    Route::view('register', 'register'),

    //TEACHER ROUTES
    Route::get('teacher', [TeacherController::class, 'index'])->middleware('auth:teacher'),
    Route::get('teacher/classes/create', [TeacherController::class, 'showCreatePage'])->middleware('auth:teacher'),


    //ADMIN ROUTES
    Route::view('admin', 'admin/dashboard')
        ->middleware('auth:admin'),

    //API ROUTES
    Route::post('api/register', [AuthController::class, 'register']),
    Route::post('api/login', [AuthController::class, 'login']),
    Route::post('api/logout', [AuthController::class, 'logout'])
        ->middleware('auth'),

    Route::get('api/user', [AuthController::class, 'currentUser'])
        ->middleware('auth'),

    Route::post('api/class', [ClassController::class, 'create'])
        ->middleware('auth:teacher'),
];
