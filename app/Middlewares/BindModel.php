<?php

namespace App\Middlewares;

use App\Exceptions\NotFoundException;
use App\Models\Classes;
use App\Models\ClassWork;
use App\Models\Lesson;
use App\Models\Model;
use App\Models\SubmittedClassWork;

class BindModel
{

    private static $modelMap = [
        'class' => Classes::class,
        'lesson' => Lesson::class,
        'work' => ClassWork::class,
        'submitWork' => SubmittedClassWork::class,
    ];

    public function handle($modelName)
    {
        $modelId = $this->getId($modelName);
        $modelClass = static::$modelMap[$modelName];

        $model = $modelClass::findOr($modelId, function () {
            throw new NotFoundException();
        });

        $model->setAsCurrent();
    }

    private function getId($modelName)
    {
        $id = request()->get('id');
        return request()->get($modelName, $id);
    }

    public static function getKey($model)
    {
        foreach(static::$modelMap as $key => $value) {
            if (is_a($model, $value)) return $key;
        }
        return false;
    }
}