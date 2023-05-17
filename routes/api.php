<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\ProjectController;
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

Route::group(['prefix' => 'info'], function (){
    Route::get('/', [PersonalInfoController::class, 'index']);
    Route::post('/', [PersonalInfoController::class, 'create']);
    Route::patch('/', [PersonalInfoController::class, 'patch']);
    Route::delete('/', [PersonalInfoController::class, 'delete']);
    Route::get('/download', [PersonalInfoController::class, 'download']);

});

Route::group(['prefix' => 'links'], function (){
    Route::get('/', [LinkController::class, 'index']);
    Route::post('/', [LinkController::class, 'create']);
    Route::delete('/{link}', [LinkController::class, 'delete']);
});

Route::group(['prefix' => 'projects'], function (){
    Route::get('/', [ProjectController::class, 'index']);
    Route::post('/', [ProjectController::class, 'create']);
    Route::post('/{project}', [ProjectController::class, 'addTag']);
    Route::patch('/{project}', [ProjectController::class, 'update']);
    Route::delete('/{project}', [ProjectController::class, 'delete']);
});

Route::group(['prefix' => 'blogs'], function (){
    Route::get('/', [BlogController::class, 'index']);
    Route::post('/', [BlogController::class, 'create']);
    Route::post('/{blog}', [BlogController::class, 'addTag']);
    Route::patch('/{blog}', [BlogController::class, 'update']);
    Route::delete('/{blog}', [BlogController::class, 'delete']);
});

Route::group(['prefix' => 'files'], function () {
    Route::get('/', [FileController::class, 'getFileByName']);
    Route::post('/', [FileController::class, 'create']);
});

Route::group(['prefix'=>'experiences'], function (){
    Route::get('/', [ExperienceController::class, 'index']);
    Route::post('/', [ExperienceController::class, 'create']);
    Route::patch('/', [ExperienceController::class, 'patch']);
    Route::delete('/', [ExperienceController::class, 'delete']);
});
