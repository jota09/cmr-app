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

    /**
     * Store a newly created resource in storage.
     *
     * @param  integer  $repositoryID
     * @param  integer  $projectID
     * @return \Illuminate\Http\Response
     */
    public function storageProject($repositoryID,$projectID)
    {
        return $this->repositoryService->storageProject($repositoryID,$projectID);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  integer  $repositoryID
     * @param  integer  $subjectID
     * @return \Illuminate\Http\Response
     */
    public function storageSubject($repositoryID,$subjectID)
    {
        return $this->repositoryService->storageSubject($repositoryID,$subjectID);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  integer  $repositoryID
     * @param  integer  $projectID
     * @param  integer  $subjectID
     * @return \Illuminate\Http\Response
     */
    public function storageProjectSubject($repositoryID,$projectID,$subjectID)
    {
        return $this->repositoryService->storageProjectSubject($repositoryID,$projectID,$subjectID);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  integer  $repositoryID
     * @param  integer  $subjectID
     * @param  integer  $projectID
     * @return \Illuminate\Http\Response
     */
    public function storageSubjectProject($repositoryID,$subjectID,$projectID)
    {
        return $this->repositoryService->storageSubjectProject($repositoryID,$subjectID,$projectID);
    }
}
