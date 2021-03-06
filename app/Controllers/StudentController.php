<?php

namespace App\Controllers;

use App\Models\Classes;
use App\Models\ClassWork;
use App\Models\Lesson;
use App\Models\SubmittedClassWork;

class StudentController extends BaseController
{
    #student
    public function index()
    {
        $classes = user()->enrolledClasses;
        return view()->page(
            'student/classes/index',
            compact('classes')
        );
    }

    #student/classes/view
    public function showLessonsPage()
    {
        $class = Classes::current();
        return view()->page(
            'student/classes/lesson/all',
            compact('class')
        );
    }

    #student/classes/view-lesson
    public function showLessonPage()
    {
        $lesson = Lesson::current();
        $class = $lesson->class;
        return view()->page(
            'student/classes/lesson/view-lesson',
            compact('lesson', 'class')
        );
    }

    #student/classes/works
    public function showClassWorksPage()
    {
        $class = Classes::current();
        $works = $class->works;
        $submitted = user()->submitted()->select('class_work_id', 'status', 'grade')->get()->keyBy('class_work_id');
        return view()->page(
            'student/classes/works/index',
            compact('class', 'works', 'submitted')
        );
    }

    #student/classes/view-work
    public function showClassWorkPage()
    {
        $work = ClassWork::current();
        $class = $work->class;
        $submitted = SubmittedClassWork::firstOrCreate([
            'class_work_id' => $work->id,
            'student_id' => auth()->id(),
        ]);
        return view()->page('student/classes/works/view-work', compact('class', 'work', 'submitted'));
    }

    #student/classes/students
    public function showStudentsPage()
    {
        $class = Classes::current();
        $students = $class->students;

        return view()->page(
            'student/classes/people/index',
            compact('class', 'students')
        );
    }

    #student/classes/files
    public function showFilesPage()
    {
        $class = Classes::current();
        $files = $class->files;
        return view()->page(
            'student/classes/files/index',
            compact('class', 'files')
        );
    }
}
