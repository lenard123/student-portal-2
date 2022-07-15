<?php

use App\Controllers\Api\AuthController;
use App\Controllers\Api\ClassController;
use App\Controllers\Api\LessonController;
use App\Route;

return [
    //API ROUTES
    Route::post('api/register', [AuthController::class, 'register']),
    Route::post('api/login', [AuthController::class, 'login']),
    Route::post('api/logout', [AuthController::class, 'logout'])
        ->middleware('auth'),

    Route::get('api/user', [AuthController::class, 'currentUser'])
        ->middleware('auth'),

    Route::post('api/class', [ClassController::class, 'create'])
        ->middleware('auth:teacher'),

    Route::post('api/lesson', [LessonController::class, 'create'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),
    Route::put('api/lesson', [LessonController::class, 'edit'])
        ->middleware('auth:teacher')
        ->middleware('model:lesson'),
    Route::delete('api/lesson', [LessonController::class, 'destroy'])
        ->middleware('auth:teacher')
        ->middleware('model:lesson'),
];