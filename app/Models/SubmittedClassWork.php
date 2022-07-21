<?php

namespace App\Models;

use App\ClassFileManager;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class SubmittedClassWork extends Model
{
    protected $table = 'submitted_class_works';

    protected $fillable = ['class_work_id', 'student_id'];

    protected $casts = [
        'attachments' => 'array'
    ];

    protected $appends = ['is_submitted'];

    protected $attributes = [
        'status' => 'pending',
    ];

    public function addAttachment($file)
    {
        $fileManager = $this->class_file_manager;
        $uploadedFileRef = $fileManager->upload($file, "works/{$this->class_work_id}/{$this->student_id}/");   

        $uploadedFile = [
            'id' => $uploadedFileRef,
            'name' => $file['name'],
            'size' => $file['size'],
        ];

        $attachments = $this->attachments;
        $attachments[] = $uploadedFile;
        $this->attachments = $attachments;
        $this->save();

        return $uploadedFile;
    }


    public function getClassFileManagerAttribute() : ClassFileManager
    {
        $class = $this->classWork->class;
        return $class->file_manager;
    }

    public function classWork() 
    {
        return $this->belongsTo(ClassWork::class, 'class_work_id', 'id');
    }

    public function getIsSubmittedAttribute()
    {
        return $this->attributes['status'] === 'submitted';
    }

    public function getStatusAttribute()
    {
        $status = $this->attributes['status'];

        if ($status === 'pending') return 'Pending';

        
        return 'Submitted';
    }
}