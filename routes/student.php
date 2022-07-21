<?php

use App\Controllers\StudentController;
use App\Route;

return [
    Route::get('student', [StudentController::class, 'index'])
        ->middleware('auth:student'),

    Route::get('student/classes/view', [StudentController::class, 'showLessonsPage'])
        ->middleware('auth:student')
        ->middleware('model:class'),

    Route::get('student/classes/view-lesson', [StudentController::class, 'showLessonPage'])
        ->middleware('auth:student')
        ->middleware('model:lesson'),

    Route::get('student/classes/works', [StudentController::class, 'showClassWorksPage'])
        ->middleware('auth:student')
        ->middleware('model:class'),

    Route::get('student/classes/view-work', [StudentController::class, 'showClassWorkPage'])
        ->middleware('auth:student')
        ->middleware('model:work'),

    Route::get('student/classes/students', [StudentController::class, 'showStudentsPage'])
        ->middleware('auth:student')
        ->middleware('model:class'),

    Route::get('student/classes/files', [StudentController::class, 'showFilesPage'])
        ->middleware('auth:student')
        ->middleware('model:class'),
];