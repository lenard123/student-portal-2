<?php

namespace App;

use App\Models\Classes;
use Exception;
use League\Flysystem\FileAttributes;
use League\Flysystem\Local\LocalFilesystemAdapter;

class ClassFileManager
{
    public readonly LocalFilesystemAdapter $fileSystem;

    public function __construct(private Classes $class)
    {
        $this->fileSystem = new LocalFilesystemAdapter(
            $this->root()
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

    public function upload($file)
    {
        $this->addId($file);
        $dest = $this->root($file['name']);

        move_uploaded_file($file['tmp_name'], $dest);
    }

    public function root($path = '')
    {
        return ROOT_DIR . '/storage/classes/' . $this->class->code . '/' . $path;
    }

    public function addId(&$file)
    {
        $pathinfo = pathinfo($file['name']);
        $file['name'] = uniqid($pathinfo['filename'] . '-') .'.'. $pathinfo['extension'];
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