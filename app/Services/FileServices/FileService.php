<?php

namespace App\Services\FileServices;

use App\Exceptions\ApiBadRequestException;
use App\Exceptions\ApiNotFoundException;
use App\Models\File;
use App\Services\FileServices\Handlers\AbstractFileHandler;
use App\Services\FileServices\Handlers\ImageHandler;
use App\Services\FileServices\Handlers\PdfHandler;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileService
{

    private $handlers = [
        PdfHandler::class,
        ImageHandler::class,
    ];

    private ?AbstractFileHandler $fileHandler = null;

    public function getStream(File $file){
        if( Storage::exists($file->path))
            return Storage::download($file->path, $file->original_name);
        return null;
    }

    public function delete(File $file){
        return $this->getFileHandler($file->mimeTypeTitle)->delete($file);
    }

    public function save(UploadedFile $uploadedFile){
        $mimetype = DB::table('mime_types')->where('title', $uploadedFile->getClientMimeType())->first();

        if (!isset($mimetype))
            throw new ApiNotFoundException('File mime type is undefined' . $uploadedFile->getMimeType());

        $path = $this->getFileHandler($uploadedFile->getClientMimeType())->store($uploadedFile);

        $file = new File([
            'original_name' => $uploadedFile->getClientOriginalName(),
            'original_extension' => $uploadedFile->getClientOriginalExtension(),
            'path' => $path,
            'mimetype_id' => $mimetype->id,
        ]);

        $file->save();

        return $file;
    }

    private function findHandlerClass(string $fileType): string{
        foreach ($this->handlers as $handler)
            if (in_array($fileType, $handler::fileTypes))
                return $handler;

        throw new ApiBadRequestException('File format (mime type) not supported');
    }

    private function getFileHandler(string $fileType): AbstractFileHandler{
        $handlerClass = $this->findHandlerClass($fileType);

        if (!($this->fileHandler instanceof $handlerClass))
            $this->fileHandler = new $handlerClass;

        return $this->fileHandler;
    }

}
