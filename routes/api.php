<?php

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

/*
  Public API Routes
*/

Route::post('/staging', SubjectStaging::class);

Route::group([
    'middleware' => 'externalapp',
    'prefix' => 'v1'
    ], function(){
    Route::get('/repositories/{repositoryID}/subjects', 'RespositoryController@showSubject')->name('showSubject');
    Route::get('/repositories/{repositoryID}/projects', 'RespositoryController@showProjects')->name('showProjects');
    Route::get('/repositories/{repositoryID}/projects/{projectID}/subjects', 'RespositoryController@showProjectsSubjects')->name('showProjectsSubjects');
    Route::get('/repositories/{repositoryID}/subjects/{subjectID}/projects', 'RespositoryController@showSubjectsProjects')->name('showSubjectsProjects');
});

