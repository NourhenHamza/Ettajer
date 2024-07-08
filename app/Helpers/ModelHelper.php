<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ModelHelper
{
    public static function getAllModels()
    {
        $models = [];
        $modelPath = app_path('Models');

        foreach (File::allFiles($modelPath) as $file) {
            $relativePath = $file->getRelativePathName();
            $class = 'App\\Models\\' . Str::replaceLast('.php', '', Str::replace('/', '\\', $relativePath));
            if (class_exists($class)) {
                $models[] = $class;
            }
        }

        return $models;
    }
}
