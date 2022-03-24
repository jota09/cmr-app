<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RespositoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectStaging;
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

/*
  Public API Routes
*/

Route::post('/staging', SubjectStaging::class);

Route::group(['prefix' => 'v1'], function(){
    Route::resource('repositories', RespositoryController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('subjects', SubjectController::class);
});

