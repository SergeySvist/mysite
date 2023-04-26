<?php

namespace App\Services\FileServices\Handlers;

use App\Models\File;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

abstract class AbstractFileHandler
{
    protected string $directory = "";

    public const fileTypes = [];

    public abstract function store(UploadedFile $uploadedFile): string;

    public function delete(File $file): bool{
        try {
            $path = $file->path;

            if(Storage::exists($path))
                Storage::delete($path);
        } catch(Exception) {
            return false;
        } finally {
            $file->delete();
        }

        return true;
    }

}

