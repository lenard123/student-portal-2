<?php

namespace App\Controllers;

class TeacherController extends BaseController
{
    public function index()
    {
        return view()->page('teacher/index');
    }
}