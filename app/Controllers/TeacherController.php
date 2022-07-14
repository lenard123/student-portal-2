<?php

namespace App\Controllers;

use App\Models\Classes;
use App\Models\GradeLevel;
use App\Models\Lesson;

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

    public function showLessonPage()
    {
        $lesson = Lesson::current();
        $class = $lesson->class;
        return view()->page('teacher/classes/view-lesson', compact('lesson', 'class'));
    }

    public function showCreateLessonPage()
    {
        $class = Classes::current();
        return view()->page('teacher/classes/create-lesson', compact('class'));
    }

    public function showEditLessonPage()
    {
        $lesson = Lesson::current();
        $class = $lesson->class;
        return view()->page('teacher/classes/edit-lesson', compact('lesson', 'class'));
    }
}