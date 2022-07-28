<?php

use App\Route;
use App\AdminRoute;

return [
    //ADMIN ROUTES
    AdminRoute::view('/', 'admin/dashboard'),
    AdminRoute::view('/announcements', 'admin/announcements/index'),
    
    Route::view('admin/login', 'admin/login')
];