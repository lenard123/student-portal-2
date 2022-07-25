<?php

namespace App;

use Carbon\Carbon;
use League\Flysystem\FileAttributes;
use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\StorageAttributes;

class ClassFile
{

    public readonly string $name;
    public readonly ?Carbon $last_modified;
    public readonly ?int $size;
    private LocalFilesystemAdapter $handler;

    public function __construct(FileAttributes $file, LocalFilesystemAdapter $handler)
    {
        $this->name = $file->path();
        $this->last_modified = new Carbon($file->lastModified());
        $this->size = $file->fileSize();
        $this->handler = $handler;
    }

    public function content()
    {
        return $this->handler->read($this->name);
    }

    public static function make(string $path, LocalFilesystemAdapter $handler)
    {
        return new ClassFile(new FileAttributes($path), $handler);
    }
}