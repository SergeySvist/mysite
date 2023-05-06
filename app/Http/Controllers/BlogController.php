<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiNotFoundException;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Blog;
use App\Models\BlogFile;
use App\Models\Project;
use App\Models\ProjectFile;
use App\Services\FileServices\FileService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    use ApiResponser;
    private function createNewBlogFile(int $blogId, int $fileId, string $fileType){
        $filetypeObj = DB::table('file_types')->where('slug', $fileType)->first();

        if (!isset($filetypeObj))
            throw new ApiNotFoundException('File type is undefined');

        $blogFile = new BlogFile([
            'blog_id' => $blogId,
            'file_id' => $fileId,
            'filetype_id' => $filetypeObj->id,
        ]);

        $blogFile->save();
    }

    private function updateBlogFile(Blog $blog, string $fileTypeSlug, UpdateBlogRequest $request, FileService $fileService){
        if (isset($request[$fileTypeSlug])){

            $fileService->delete($this->findFileBySlug($blog,$fileTypeSlug));

            $file = $fileService->save($request['avatar']);
            $this->createNewProjectFile($blog->id, $file->id, $fileTypeSlug);
        }
    }

    private function findFileBySlug(Blog $blog ,string $slug){
        for ($i=0;$i<count($blog->blogFilesData->toArray());$i++){
            if($blog->blogFilesData[$i]->fileType->slug == $slug)
                return $blog->blogFilesData[$i]->file;
        }
        throw new ApiNotFoundException("File not found");
    }

    public function index(){
        dd('index');
    }
}
