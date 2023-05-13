<?php

namespace App\Http\Controllers;

use App\Http\Requests\Files\CreateFileRequest;
use App\Http\Requests\Files\GetFileRequest;
use App\Models\File;
use App\Services\FileServices\FileService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    use ApiResponser;

    public function getFileByName(GetFileRequest $request){
        return $this->successResponse([File::where("original_name", "=", $request->validated()['name'])->first()->url]);
    }

    public function create(CreateFileRequest $request, FileService $fileService){
        $file = $fileService->save($request->validated()['file']);

        return $this->successResponse([$file->toArray()], null, Response::HTTP_CREATED);
    }
}
