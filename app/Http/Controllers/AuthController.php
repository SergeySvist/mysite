<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiUnauthorizedException;
use App\Http\Requests\Auth\SigninRequest;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;

    public function signin(SigninRequest $request){
        $data = $request->validated();

        if(! Auth::attempt($data))
            throw new ApiUnauthorizedException();

        return $this->successResponse(
            [['access_token'=>Auth::user()->createToken('access_token')->plainTextToken]],
        );

    }

    public function signout(){
        Auth::user()->tokens()->delete();
        return $this->successResponse();
    }

}
