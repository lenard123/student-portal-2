<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Classes;

class ClassController extends BaseController
{
    public function create()
    {
        $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'section' => 'required',
        ]);

        $new_class = new Classes();
        $new_class->fill(request()->only('name', 'grade', 'section'));
        $new_class->teacher()->associate(auth()->user());
        $new_class->code = Classes::generateCode();
        $new_class->cover = Classes::generateCover();
        $new_class->save();

        return $new_class;
    }
}