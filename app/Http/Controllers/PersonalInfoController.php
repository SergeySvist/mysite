<?php

namespace App\Http\Controllers;

use App\Http\Requests\Info\CreateInfoRequest;
use App\Http\Requests\Info\GetInfoRequest;
use App\Models\Language;
use App\Models\PersonalInfo;
use App\Services\FileServices\FileService;
use App\Traits\ApiResponser;
use Symfony\Component\HttpFoundation\Response;

class PersonalInfoController extends Controller
{
    use ApiResponser;

    public function index(GetInfoRequest $request){
        $personalInfo = PersonalInfo::join('languages', 'languages.id', '=', 'personal_infos.language_id')
            ->where('languages.slug', '=', $request->validated()['lang'])
            ->get('personal_infos.*');

        return $this->successResponse([$personalInfo]);
    }

    public function create(CreateInfoRequest $request, FileService $fileService){
        $info = new PersonalInfo($request->validated());

        $cv = $fileService->save($request['cv']);
        $info->cv_id = $cv->id;
        $avatar = $fileService->save($request['avatar']);
        $info->avatar_id = $avatar->id;

        $info->language_id = Language::where('slug', '=', $request['language'])->first()->id;

        $info->save();
        return $this->successResponse($info->toArray(), null, Response::HTTP_CREATED);
    }
}
