<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetInfoRequest;
use App\Models\Language;
use App\Models\PersonalInfo;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    use ApiResponser;

    public function index(GetInfoRequest $request){
        $personalInfo = PersonalInfo::join('languages', 'languages.id', '=', 'personal_infos.language_id')
            ->where('languages.slug', '=', $request->validated()['lang'])
            ->get('personal_infos.*');

        return $this->successResponse([$personalInfo]);
    }
}
