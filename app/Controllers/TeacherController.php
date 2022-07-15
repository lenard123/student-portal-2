<?php

namespace App\Controllers;

use App\Models\Classes;
use App\Models\GradeLevel;
use App\Models\Lesson;

class TeacherController extends BaseController
{
    //teacher
    public function index()
    {
        $classes = auth()->user()->classes;
        return view()->page('teacher/classes/index', compact('classes'));
    }

    //teacher/classes/create
    public function showCreatePage()
    {
        $levels = GradeLevel::all();
        return view()->page('teacher/classes/create', compact('levels'));
    }

    //teacher/classes/view
    public function showLessonsPage()
    {
        $class = Classes::current();
        return view()->page('teacher/classes/lesson/all', compact('class'));
    }

    //teacher/classes/view-lesson
    public function showLessonPage()
    {
        $lesson = Lesson::current();
        $class = $lesson->class;
        return view()->page('teacher/classes/lesson/view-lesson', compact('lesson', 'class'));
    }

    //teacher/classes/create-lesson
    public function showCreateLessonPage()
    {
        $class = Classes::current();
        return view()->page('teacher/classes/lesson/create-lesson', compact('class'));
    }

    //teacher/classes/edit-lesson
    public function showEditLessonPage()
    {
        $lesson = Lesson::current();
        $class = $lesson->class;
        return view()->page('teacher/classes/lesson/edit-lesson', compact('lesson', 'class'));
    }

    //teacher/classes/works
    public function showClassWorksPage()
    {
        $class = Classes::current();
        return $class;
    }
}