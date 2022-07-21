<?php

use App\Controllers\Api\AuthController;
use App\Controllers\Api\ClassController;
use App\Controllers\Api\LessonController;
use App\Controllers\Api\WorkController;
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
    Route::post('api/class/students', [ClassController::class, 'join'])
        ->middleware('auth:student'),
    Route::get('api/class/file', [ClassController::class, 'download'])
        ->middleware('auth:teacher,student')
        ->middleware('model:class'),
    Route::post('api/class/file', [ClassController::class, 'upload'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),

    Route::post('api/lesson', [LessonController::class, 'create'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),
    Route::put('api/lesson', [LessonController::class, 'edit'])
        ->middleware('auth:teacher')
        ->middleware('model:lesson'),
    Route::delete('api/lesson', [LessonController::class, 'destroy'])
        ->middleware('auth:teacher')
        ->middleware('model:lesson'),


    Route::post('api/work', [WorkController::class, 'create'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),
    Route::patch('api/work', [WorkController::class, 'submit'])
        ->middleware('auth:student')
        ->middleware('model:submitWork'),
    Route::post('api/work/files', [WorkController::class, 'upload'])
        ->middleware('auth:student')
        ->middleware('model:work'),
    Route::delete('api/work', [WorkController::class, 'destroy'])
        ->middleware('auth:teacher')
        ->middleware('model:work'),
];