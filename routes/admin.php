<?php

use App\Route;

return [
    //ADMIN ROUTES
    Route::view('admin', 'admin/dashboard')
        ->middleware('auth:admin'),
];