<?php

namespace App;

use App\Models\Classes;
use Exception;
use League\Flysystem\FileAttributes;
use League\Flysystem\Local\LocalFilesystemAdapter;

class ClassFileManager
{
    public readonly LocalFilesystemAdapter $fileSystem;

    public function __construct(Classes $class)
    {
        $this->fileSystem = new LocalFilesystemAdapter(
            ROOT_DIR . '/storage/classes/' . $class->code . '/'
        );
    }

    public function getFiles()
    {
        $files = [];

        $listing = $this->fileSystem->listContents('', false);

        foreach($listing as $item) {
            if ($item instanceof FileAttributes) {
                array_push($files, new ClassFile($item, $this->fileSystem));
            }
        }
        
        return $files;
    }

    public function getFile($path) : ClassFile
    {
        $files = $this->getFiles();
        foreach ($files as $file) {
            if ($file->name === $path) {
                return $file;
            }
        }

        throw new Exception("File Not Exists");
    }
}