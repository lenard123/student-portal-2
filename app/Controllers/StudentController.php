<?php

namespace App\Controllers;

use App\Models\Classes;

class StudentController extends BaseController
{
    #student
    public function index()
    {
        $classes = user()->enrolledClasses;
        return view()->page('student/classes/index', compact('classes'));
    }

    #student/classes/view
    public function showLessonsPage()
    {
        $class = Classes::current();
        return view()->page('student/classes/lesson/all', compact('class'));
    }
}
