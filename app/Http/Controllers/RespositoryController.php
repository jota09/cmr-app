<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use App\Services\RepositoryService;
use Illuminate\Http\Request;

class RespositoryController extends Controller
{
    protected $repositoryService;

    /**
     * Create a new BillController instance.
     *
     * @return void
     */
    public function __construct(RepositoryService $service)
    {
        $this->repositoryService = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Return subject of repository
     *
     * @param  integer  $repositoryID
     * @return \Illuminate\Http\Response
     */
    public function showSubject($repositoryID)
    {
        return $this->repositoryService->showSubject($repositoryID);
    }

    /**
     * Return subject of repository
     *
     * @param  integer  $repositoryID
     * @return \Illuminate\Http\Response
     */
    public function showProjects($repositoryID)
    {
        return $this->repositoryService->showProjects($repositoryID);
    }

    /**
     * Return subject of repository
     *
     * @param  integer  $repositoryID
     * @return \Illuminate\Http\Response
     */
    public function showProjectsSubjects($repositoryID,$projectID)
    {
        return $this->repositoryService->showProjectsSubjects($repositoryID,$projectID);
    }

    /**
     * Return subject of repository
     *
     * @param  integer  $repositoryID
     * @return \Illuminate\Http\Response
     */
    public function showSubjectsProjects($repositoryID,$subjectID)
    {
        return $this->repositoryService->showSubjectsProjects($repositoryID,$subjectID);
    }


}
