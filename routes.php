<?php

use App\Controllers\Api\AuthController;
use App\Controllers\Api\ClassController;
use App\Controllers\Api\LessonController;
use App\Controllers\TeacherController;
use App\Route;

return [
    Route::view('', 'home'),
    Route::view('login', 'login'),
    Route::view('register', 'register'),

    //TEACHER ROUTES
    Route::get('teacher', [TeacherController::class, 'index'])->middleware('auth:teacher'),
    Route::get('teacher/classes/create', [TeacherController::class, 'showCreatePage'])->middleware('auth:teacher'),
    Route::get('teacher/classes/view', [TeacherController::class, 'showLessonsPage'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),
    Route::get('teacher/classes/create-lesson', [TeacherController::class, 'showCreateLessonPage'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),


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

    Route::post('api/lesson', [LessonController::class, 'create'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),
];
