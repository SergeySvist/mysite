<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiNotFoundException;
use App\Http\Requests\Info\CreateInfoRequest;
use App\Http\Requests\Info\DeleteInfoRequest;
use App\Http\Requests\Info\DownloadInfoFileRequest;
use App\Http\Requests\Info\GetInfoRequest;
use App\Http\Requests\Info\PatchInfoRequest;
use App\Models\Language;
use App\Models\PersonalInfo;
use App\Models\Project;
use App\Services\FileServices\FileService;
use App\Traits\ApiResponser;
use Symfony\Component\HttpFoundation\Response;

class PersonalInfoController extends Controller
{
    use ApiResponser;

    private function getInfoByLang(string $lang){
        return PersonalInfo::join('languages', 'languages.id', '=', 'personal_infos.language_id')
            ->where('languages.slug', '=', $lang)
            ->get('personal_infos.*')->first();
    }
    public function index(GetInfoRequest $request){
        $personalInfo = $this->getInfoByLang($request->validated()['lang']);

        return $this->successResponse([$personalInfo]);
    }
    public function download(DownloadInfoFileRequest $request, FileService $fileService){
        $info = $this->getInfoByLang($request->validated()['lang']);

        switch ($request->validated('file')){
            case 'cv':
                return $fileService->getStream($info->cv);
                break;
            default:
                break;
        }

        throw new ApiNotFoundException('File not found');
    }

    public function create(CreateInfoRequest $request, FileService $fileService){
        $info = new PersonalInfo($request->validated());

        $cv = $fileService->save($request['cv']);
        $info->cv_id = $cv->id;
        $avatar = $fileService->save($request['avatar']);
        $info->avatar_id = $avatar->id;

        $info->language_id = Language::where('slug', '=', $request['language'])->first()->id;

        $info->save();
        return $this->successResponse([$info->toArray()], null, Response::HTTP_CREATED);
    }

    ///DONT WORK
    public function patch(PatchInfoRequest $request, FileService $fileService){
//        $info = $this->getInfoByLang($request->validated()['lang']);
//        $info->fill($request->validated());
//
//        if (isset($request['avatar'])){
//            $fileService->delete($info->avatar);
//
//            $file = $fileService->save($request['avatar']);
//            $info->avatar_id = $request['avatar'];
//        }
//
//        if (isset($request['cv'])){
//            $fileService->delete($info->cv);
//
//            $file = $fileService->save($request['cv']);
//            $info->cv_id = $request['cv'];
//        }
//
//        $info->save();
        return $this->successResponse([$request->validated()], null, Response::HTTP_ACCEPTED);
    }

    public function delete(DeleteInfoRequest $request, FileService $fileService){
        $info = $this->getInfoByLang($request->validated()['lang']);
        $fileService->delete($info->cv);
        $fileService->delete($info->avatar);

        $info->delete();
        return $this->successResponse([$info->id], null, Response::HTTP_ACCEPTED);
    }

}
