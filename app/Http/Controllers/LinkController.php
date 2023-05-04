<?php

namespace App\Http\Controllers;

use App\Http\Requests\Links\CreatelinkRequest;
use App\Models\Link;
use App\Models\PersonalInfo;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller
{
    use ApiResponser;

    public function index(){
        return $this->successResponse([Link::all()->toArray()]);
    }

    public function create(CreatelinkRequest $request){
        $link = Link::create($request->validated());
        foreach (PersonalInfo::all() as $pi){
            $pi->links()->attach($link->id);
            $pi->save();
        }
        return $this->successResponse([$link->id], null, Response::HTTP_CREATED);
    }

    public function delete(Link $link){
        $link->delete();
        foreach (PersonalInfo::all() as $pi){
            $pi->links()->detach($link->id);
            $pi->save();
        }
        return $this->successResponse([$link->id], null, Response::HTTP_ACCEPTED);
    }

}
