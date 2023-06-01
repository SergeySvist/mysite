<?php

namespace App\Http\Controllers;

use App\Http\Requests\Skills\CreateSkillRequest;
use App\Models\Skill;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillsController extends Controller
{
    use ApiResponser;
    public function index(){
        return $this->successResponse([Skill::all()->toArray()]);
    }

    public function create(CreateSkillRequest $request){
        $skill = Skill::create($request->validated());
        return $this->successResponse([$skill->toArray()], null, Response::HTTP_CREATED);
    }

    public function delete(Skill $skill){
        $skill->delete();
        return $this->successResponse([$skill->id], null, Response::HTTP_ACCEPTED);
    }

}
