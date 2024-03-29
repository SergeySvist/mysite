<?php

namespace App\Services\FileServices\Handlers;

use Illuminate\Http\UploadedFile;

class ImageHandler extends AbstractFileHandler
{
    protected string $directory = "images";

    public const fileTypes = [
        "image/png",
        "image/jpg",
        "image/jpeg",
    ];

    public function store(UploadedFile $uploadedFile): string
    {
        return $uploadedFile->store($this->directory);
    }
}
