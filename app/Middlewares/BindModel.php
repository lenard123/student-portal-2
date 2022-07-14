<?php

namespace App\Middlewares;

use App\Exceptions\NotFoundException;
use App\Models\Classes;
use App\Models\Lesson;
use App\Models\Model;

class BindModel
{

    private static $modelMap = [
        'class' => Classes::class,
        'lesson' => Lesson::class,
    ];

    public function handle($modelName)
    {
        $modelId = request()->get($modelName);
        $modelClass = static::$modelMap[$modelName];

        $model = $modelClass::findOr($modelId, function () {
            throw new NotFoundException();
        });

        $model->setAsCurrent();
    }

    public static function getKey($model)
    {
        foreach(static::$modelMap as $key => $value) {
            if (is_a($model, $value)) return $key;
        }
        return false;
    }
}