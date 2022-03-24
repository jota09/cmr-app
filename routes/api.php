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
    Route::match(['get', 'post'], '/repositories/{repositoryID}/projects/{projectID}', 'RespositoryController@storageProject')->name('storageProject');
    Route::match(['get', 'post'], '/repositories/{repositoryID}/subjects/{subjectID}', 'RespositoryController@storageSubject')->name('storageSubject');
    Route::match(['get', 'post'], '/repositories/{repositoryID}/projects/{projectID}/subjects/{subjectID}', 'RespositoryController@storageProjectSubject')->name('storageProjectSubject');
    Route::match(['get', 'post'], '/repositories/{repositoryID}/subjects/{subjectID}/projects/{projectID}', 'RespositoryController@storageSubjectProject')->name('storageSubjectProject');
});

