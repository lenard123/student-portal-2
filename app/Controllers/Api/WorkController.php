<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Classes;
use App\Models\ClassWork;

class WorkController extends BaseController
{
    public function create()
    {
        $this->validate([
            'title' => 'required',
            'instruction' => 'required',
            'deadline' => 'nullable|date:Y-m-d|after:yesterday'
        ]);

        $work = new ClassWork();
        $work->class()->associate(Classes::current());
        $work->title = request()->title;
        $work->instruction = request()->instruction;
        $work->deadline = request()->date('deadline');
        $work->save();

        return $work;
    }

    public function destroy()
    {
        return ClassWork::current()->delete();
    }
}