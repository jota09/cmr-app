<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectStaging extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->request->add(['token' => env("INTERNALTOKEN")]);
        switch ($request->action){
            case 'showSubject':
                return redirect()->route('showSubject', $request->toArray());
                break;
            case 'showProjects':
                return redirect()->route('showProjects', $request->toArray());
                break;
            case 'showProjectsSubjects':
                return redirect()->route('showProjectsSubjects', $request->toArray());
                break;
            case 'showSubjectsProjects':
                return redirect()->route('showSubjectsProjects', $request->toArray());
                break;
            case 'storageProject':
                return redirect()->route('storageProject', $request->toArray());
                break;
            case 'storageSubject':
                return redirect()->route('storageSubject', array_merge($request->toArray(),["_method"=>"POST"]));
                break;
            case 'storageProjectSubject':
                return redirect()->route('storageProjectSubject', array_merge($request->toArray(),["_method"=>"POST"]));
                break;
            case 'storageSubjectProject':
                return redirect()->route('storageSubjectProject', array_merge($request->toArray(),["_method"=>"POST"]));
                break;
        }
        return abort(404);
    }
}
