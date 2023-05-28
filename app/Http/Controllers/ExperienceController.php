<?php

namespace App\Http\Controllers;

use App\Http\Requests\Experiences\CreateExperienceRequest;
use App\Http\Requests\Experiences\DeleteExperienceRequest;
use App\Http\Requests\Experiences\GetExperienceRequest;
use App\Http\Requests\Experiences\PatchExperienceRequest;
use App\Http\Requests\Info\PatchInfoRequest;
use App\Models\Experiences;
use App\Models\Language;
use App\Models\PersonalInfo;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExperienceController extends Controller
{
    use ApiResponser;

    private function getExpByLang(string $lang){
        return Experiences::join('languages', 'languages.id', '=', 'experiences.language_id')
            ->where('languages.slug', '=', $lang)
            ->get('experiences.*')->first();
    }
    public function index(GetExperienceRequest $request){
        $exp = $this->getExpByLang($request->validated()['lang']);

        return $this->successResponse([$exp]);
    }

    public function create(CreateExperienceRequest $request){
        $exp = new Experiences($request->validated());
        $exp->language_id = Language::where('slug', '=', $request['language'])->first()->id;
        $exp->save();
        return $this->successResponse([$exp->toArray()], null, Response::HTTP_CREATED);
    }

    public function patch(PatchExperienceRequest $request){
        $exp = $this->getExpByLang($request->validated()['lang']);
        $exp->fill($request->validated());
        $exp->save();

        return $this->successResponse([$exp->id], null, Response::HTTP_ACCEPTED);
    }

    public function delete(DeleteExperienceRequest $request){
        $exp = $this->getExpByLang($request->validated()['lang']);
        $exp->delete();

        return $this->successResponse([$exp->id], null, Response::HTTP_ACCEPTED);
    }
}
