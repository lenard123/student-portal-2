<?php

namespace App\Controllers;

// use Classes;

class TeacherController extends BaseController
{
    public function index()
    {
        $classes = auth()->user()->classes;
        return view()->page('teacher/classes/index', compact('classes'));
    }
}