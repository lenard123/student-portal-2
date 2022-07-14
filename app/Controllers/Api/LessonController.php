<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Classes;
use App\Models\Lesson;

class LessonController extends BaseController
{
    public function create()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $lesson = new Lesson();
        $lesson->class()->associate(Classes::current());
        $lesson->title = request()->title;
        $lesson->description = request()->description;
        $lesson->save();

        return $lesson;
    }

    public function edit()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $lesson = Lesson::current();
        $lesson->title = request()->title;
        $lesson->description = request()->description;
        $lesson->update();

        return $lesson;
    }
}