<?php

use App\Controllers\StudentController;
use App\Route;

return [
    Route::get('student', [StudentController::class, 'index'])
        ->middleware('auth:student'),

    Route::get('student/classes/view', [StudentController::class, 'showLessonsPage'])
        ->middleware('auth:student')
        ->middleware('model:class'),
];