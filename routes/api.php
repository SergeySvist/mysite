<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/signin', [AuthController::class, 'signin']);

Route::get('/info/', [PersonalInfoController::class, 'index']);
Route::get('/info/download/', [PersonalInfoController::class, 'download']);

Route::get('/links/', [LinkController::class, 'index']);
Route::get('/skills/', [SkillsController::class, 'index']);
Route::get('/projects/', [ProjectController::class, 'index']);
Route::get('/blogs/', [BlogController::class, 'index']);
Route::get('/files/', [FileController::class, 'getFileByName']);
Route::get('/experiences/', [ExperienceController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/signout', [AuthController::class, 'signout']);

    Route::group(['prefix' => 'info'], function (){
        Route::post('/', [PersonalInfoController::class, 'create']);
        Route::patch('/', [PersonalInfoController::class, 'patch']);
        Route::delete('/', [PersonalInfoController::class, 'delete']);

    });

    Route::group(['prefix' => 'links'], function (){
        Route::post('/', [LinkController::class, 'create']);
        Route::delete('/{link}', [LinkController::class, 'delete']);
    });

    Route::group(['prefix' => 'skills'], function (){
        Route::post('/', [SkillsController::class, 'create']);
        Route::delete('/{skill}', [SkillsController::class, 'delete']);
    });

    Route::group(['prefix' => 'projects'], function (){
        Route::post('/', [ProjectController::class, 'create']);
        Route::post('/{project}', [ProjectController::class, 'addTag']);
        Route::patch('/{project}', [ProjectController::class, 'update']);
        Route::delete('/{project}', [ProjectController::class, 'delete']);
    });

    Route::group(['prefix' => 'blogs'], function (){
        Route::post('/', [BlogController::class, 'create']);
        Route::post('/{blog}', [BlogController::class, 'addTag']);
        Route::patch('/{blog}', [BlogController::class, 'update']);
        Route::delete('/{blog}', [BlogController::class, 'delete']);
    });

    Route::group(['prefix' => 'files'], function () {
        Route::post('/', [FileController::class, 'create']);
    });

    Route::group(['prefix'=>'experiences'], function (){
        Route::post('/', [ExperienceController::class, 'create']);
        Route::patch('/', [ExperienceController::class, 'patch']);
        Route::delete('/', [ExperienceController::class, 'delete']);
    });

});

