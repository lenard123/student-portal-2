<?php

namespace App\Controllers;

use App\Models\Classes;
use App\Models\GradeLevel;

class TeacherController extends BaseController
{
    public function index()
    {
        $classes = auth()->user()->classes;
        return view()->page('teacher/classes/index', compact('classes'));
    }

    public function showCreatePage()
    {
        $levels = GradeLevel::all();
        return view()->page('teacher/classes/create', compact('levels'));
    }

    public function showLessonsPage()
    {
        $class = Classes::current();
        return view()->page('teacher/classes/view', compact('class'));
    }

    public function showCreateLessonPage()
    {
        $class = Classes::current();
        return view()->page('teacher/classes/create-lesson', compact('class'));
    }
}