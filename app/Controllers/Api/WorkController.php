<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Classes;
use App\Models\ClassWork;
use App\Models\SubmittedClassWork;

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

    public function upload()
    {
        $work = ClassWork::current();
        $submittedWork = SubmittedClassWork::firstOrCreate([
            'class_work_id' => $work->id,
            'student_id' => auth()->id(),
        ]);
        $file = request()->file('file');
        
        $uploadedFile = $submittedWork->addAttachment($file);

        return $uploadedFile;
    }

    public function download()
    {
        $work = SubmittedClassWork::current();
        $fileId = request()->file;
        try {
            return $work->getFile($fileId);
        } catch (Exception $ex){
            throw new NotFoundException();            
        }
    }

    public function submit()
    {
        $submittedWork = SubmittedClassWork::current();
        $submittedWork->status = request()->status;
        $submittedWork->save();

        return $submittedWork;
    }

    public function destroy()
    {
        return ClassWork::current()->delete();
    }

    public function removeFile()
    {
        $submittedWork = SubmittedClassWork::current();
        $fileId = request()->fileId;
        $submittedWork->removeAttachment($fileId);
        return null;
    }
}