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
        }
        return abort(404);
    }
}
