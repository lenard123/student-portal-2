<?php

use App\Controllers\Api\LoginController;
use App\Route;

return [
    Route::view('', 'home'),
    Route::view('login', 'login'),


    //API ROUTES
    Route::post('api/login', LoginController::class),
];
