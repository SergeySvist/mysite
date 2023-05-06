<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiNotFoundException;
use App\Http\Requests\AddTagRequest;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Blog;
use App\Models\BlogFile;
use App\Models\Language;
use App\Models\Project;
use App\Models\Tag;
use App\Services\FileServices\FileService;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

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
        return $this->successResponse([Blog::all()->toArray()]);
    }

    public function create(CreateBlogRequest $request, FileService $fileService){
        $blog = new Blog($request->validated());
        $avatar = $fileService->save($request['avatar']);

        $blog->language_id = Language::where('slug', '=', $request['lang'])->first()->id;
        $blog->save();
        $this->createNewBlogFile($blog->id, $avatar->id, 'avatar');

        return $this->successResponse($blog->toArray(), null, Response::HTTP_CREATED);
    }

    public function addTag(Blog $blog, AddTagRequest $request){
        $tag = Tag::where('title', '=', $request['tag'])->first();
        $blog->tags()->attach($tag->id);
        return $this->successResponse([], null, Response::HTTP_ACCEPTED);
    }

    public function update(Blog $blog, UpdateBlogRequest $request, FileService $fileService){
        $blog->update($request->validated());
        $this->updateBlogFile($blog, 'avatar', $request, $fileService);

        return $this->successResponse([$blog->id], null, Response::HTTP_ACCEPTED);
    }

    public function delete(Blog $blog, FileService $fileService){
        for ($i=0;$i<count($blog->blogFilesData->toArray());$i++)
            $fileService->delete($blog->blogFilesData[$i]->file);


        $blog->delete();

        return $this->successResponse([$blog->id], null, Response::HTTP_ACCEPTED);
    }


}
