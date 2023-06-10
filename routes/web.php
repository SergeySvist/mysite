<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// CLIENT ROUTES
Route::domain(env('APP_URL'))->group(function (){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/skills', function () {
        return view('welcome');
    });

    Route::get('/blogs', function () {
        return view('welcome');
    });

    Route::get('/blogs/{blog}', function () {
        return view('welcome');
    });

    Route::get('/projects', function () {
        return view('welcome');
    });
    Route::fallback(function () {
        return view('welcome');
    });
});

// ADMIN ROUTES

Route::domain('admin.'.env('APP_URL'))->group(function (){
    Route::get('/', function () {
        return view('admin');
    });
    Route::get('/dashboard', function () {
        return view('admin');
    });
    Route::get('/about', function () {
        return view('admin');
    });
    Route::get('/skills', function () {
        return view('admin');
    });
    Route::get('/projects', function () {
        return view('admin');
    });
    Route::get('/blogs', function () {
        return view('admin');
    });
    Route::get('/blogs/{blog}', function () {
        return view('admin');
    });
    Route::get('/blogs/create', function () {
        return view('admin');
    });
    Route::fallback(function () {
        return view('admin');
    });
});
