<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileTrait
{
    public $folder, $file;

    private $filePath;

    public function saveFile($name = null)
    {
        $storageFolder = Storage::disk('local')->path($this->folder);
        if (Storage::exists($storageFolder)) {
            Storage::makeDirectory($storageFolder, 0777, true, true);
        }

        $fileName = $name ?? time();
        $ext = $this->file->extension();
        $this->filePath = $this->folder . '/' . $fileName . '.' . $ext;
        Storage::disk('local')->put($this->filePath, file_get_contents($this->file));
    }

    public function deleteFile()
    {
        storage::disk('local')->delete($this->path);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function getUrl()
    {
        return Storage::url($this->path);
    }
}
