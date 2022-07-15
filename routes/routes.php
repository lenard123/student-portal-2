<?php

use App\Route;

return [
    Route::view('', 'home'),
    Route::view('login', 'login'),
    Route::view('register', 'register'),

    ...require('teacher.php'),
    ...require('admin.php'),
    ...require('api.php'),

];
