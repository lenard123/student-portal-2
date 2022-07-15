<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Exceptions\NotFoundException;
use App\Models\Classes;
use Exception;

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

    public function download()
    {
        $class = Classes::current();
        $fileManager = $class->fileManager;
        $fileName = request()->get('file');

        try {
            return $fileManager->getFile($fileName);
        } catch (Exception $ex){
            throw new NotFoundException();            
        }
    }
}