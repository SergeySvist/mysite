<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\PersonalInfoController;
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
});

Route::group(['prefix' => 'links'], function (){
    Route::get('/', [LinkController::class, 'index']);
    Route::post('/', [LinkController::class, 'create']);
    Route::delete('/{link}', [LinkController::class, 'delete']);
});
