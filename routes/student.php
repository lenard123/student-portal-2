<?php

use App\Route;

return [
    Route::view('student', 'student/classes/index')
        ->middleware('auth:student')
];