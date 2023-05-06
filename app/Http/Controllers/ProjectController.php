<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiNotFoundException;
use App\Http\Requests\Project\AddTagRequest;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Language;
use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\Tag;
use App\Services\FileServices\FileService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    use ApiResponser;

    private function createNewProjectFile(int $projectId, int $fileId, string $fileType){
        $filetypeObj = DB::table('file_types')->where('slug', $fileType)->first();

        if (!isset($filetypeObj))
            throw new ApiNotFoundException('File type is undefined');

        $projectFile = new ProjectFile([
            'project_id' => $projectId,
            'file_id' => $fileId,
            'filetype_id' => $filetypeObj->id,
        ]);

        $projectFile->save();
    }

    private function updateProjectFile(Project $project, string $fileTypeSlug, UpdateProjectRequest $request, FileService $fileService){
        if (isset($request[$fileTypeSlug])){

            $fileService->delete($this->findFileBySlug($project,$fileTypeSlug));

            $file = $fileService->save($request['avatar']);
            $this->createNewProjectFile($project->id, $file->id, $fileTypeSlug);
        }
    }

    private function findFileBySlug(Project $project ,string $slug){
        for ($i=0;$i<count($project->projectFilesData->toArray());$i++){
            if($project->projectFilesData[$i]->fileType->slug == "avatar")
                return $project->projectFilesData[$i]->file;
        }
        throw new ApiNotFoundException("File not found");
    }


    public function index(){
        return $this->successResponse([Project::all()->toArray()]);
    }

    public function create(CreateProjectRequest $request, FileService $fileService){
        $project = new Project($request->validated());
        $avatar = $fileService->save($request['avatar']);

        $project->language_id = Language::where('slug', '=', $request['lang'])->first()->id;
        $project->save();
        $this->createNewProjectFile($project->id, $avatar->id, 'avatar');

        return $this->successResponse($project->toArray(), null, Response::HTTP_CREATED);
    }

    public function addTag(Project $project, AddTagRequest $request){
        $tag = Tag::where('title', '=', $request['tag'])->first();
        $project->tags()->attach($tag->id);
        return $this->successResponse([], null, Response::HTTP_ACCEPTED);
    }

    public function update(Project $project, UpdateProjectRequest $request, FileService $fileService){
        $project->update($request->validated());
        $this->updateProjectFile($project, 'avatar', $request, $fileService);

        return $this->successResponse([$project->id], null, Response::HTTP_ACCEPTED);
    }

    public function delete(Project $project, FileService $fileService){
        for ($i=0;$i<count($project->projectFilesData->toArray());$i++)
            $fileService->delete($project->projectFilesData[$i]->file);


        $project->delete();

        return $this->successResponse([$project->id], null, Response::HTTP_ACCEPTED);
    }

}
