<?php

use App\Controllers\TeacherController;
use App\Route;

return [
    //TEACHER ROUTES
    Route::get('teacher', [TeacherController::class, 'index'])
        ->middleware('auth:teacher'),

    Route::get('teacher/classes/create', [TeacherController::class, 'showCreatePage'])
        ->middleware('auth:teacher'),

    Route::get('teacher/classes/view', [TeacherController::class, 'showLessonsPage'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),

    Route::get('teacher/classes/create-lesson', [TeacherController::class, 'showCreateLessonPage'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),

    Route::get('teacher/classes/view-lesson', [TeacherController::class, 'showLessonPage'])
        ->middleware('auth:teacher')
        ->middleware('model:lesson'),

    Route::get('teacher/classes/edit-lesson', [TeacherController::class, 'showEditLessonPage'])
        ->middleware('auth:teacher')
        ->middleware('model:lesson'),

    Route::get('teacher/classes/works', [TeacherController::class, 'showClassWorksPage'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),

    Route::get('teacher/classes/create-work', [TeacherController::class, 'showCreateWorkPage'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),

    Route::get('teacher/classes/view-work', [TeacherController::class, 'showClassWorkPage'])
        ->middleware('auth:teacher')
        ->middleware('model:work'),

    Route::get('teacher/classes/students', [TeacherController::class, 'showStudentsPage'])
        ->middleware('auth:teacher')
        ->middleware('model:class'),
];