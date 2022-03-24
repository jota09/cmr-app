<?php

namespace App\Services;

use App\DTO\RepositoryDTO;
use App\Models\Project;
use App\Models\Repository;
use App\Models\Subject;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class RepositoryService extends AppBaseService
{
    protected $model;

    public function __construct(Repository $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        //
    }

    public function showSubject($input)
    {
        $result = $this->model->getSubjects($input);

        return $this->sendResponse(
            $result['model'],
            'Repository retrieved successfully'
        );
    }

    public function showProjects($input)
    {
        $result = $this->model->showProjects($input);

        return $this->sendResponse(
            $result['model'],
            'Repository retrieved successfully'
        );
    }

    public function showProjectsSubjects($repositoryID,$projectID)
    {
        $result = $this->model->showProjectsSubjects($repositoryID,$projectID);

        return $this->sendResponse(
            $result['model'],
            'Repository retrieved successfully'
        );
    }

    public function showSubjectsProjects($repositoryID,$subjectID)
    {
        $result = $this->model->showSubjectsProjects($repositoryID,$subjectID);

        return $this->sendResponse(
            $result['model'],
            'Repository retrieved successfully'
        );
    }

    public function store($input)
    {
        $model = Repository::create($input);
        if(array_key_exists('rows', $input)) {
            $modelsAux = Row::find($input['rows']);
            $model->rows()->saveMany($modelsAux);
        }
        return $this->sendResponse(RepositoryDTO::instance()->load($model), 'Repository stored successfully');
    }

    public function storageProject($repositoryID,$projectID)
    {
        $model = Repository::create(["id"=>$repositoryID]);
        Project::create(["id"=>$projectID, "repository_id"=>$repositoryID]);
        return $this->sendResponse(RepositoryDTO::instance()->load($model,"projects"), 'Repository stored successfully');
    }

    public function storageSubject($repositoryID,$subjectID)
    {
        $model = Repository::create(["id"=>$repositoryID]);
        Subject::create(["id"=>$subjectID, "repository_id"=>$repositoryID]);
        return $this->sendResponse(RepositoryDTO::instance()->load($model,"subjects"), 'Repository stored successfully');
    }

    public function storageProjectSubject($repositoryID,$projectID,$subjectID)
    {
        $model = Repository::create(["id"=>$repositoryID]);
        Project::create(["id"=>$projectID, "repository_id"=>$repositoryID]);
        Subject::create(["id"=>$subjectID, "repository_id"=>$repositoryID, "project_id" => $projectID]);
        return $this->sendResponse(RepositoryDTO::instance()->load($model,"full"), 'Repository stored successfully');
    }

    public function storageSubjectProject($repositoryID,$subjectID,$projectID)
    {
        $model = Repository::create(["id"=>$repositoryID]);
        Subject::create(["id"=>$subjectID, "repository_id"=>$repositoryID, "project_id" => $projectID]);
        Project::create(["id"=>$projectID, "repository_id"=>$repositoryID]);
        return $this->sendResponse(RepositoryDTO::instance()->load($model,"full"), 'Repository stored successfully');
    }

}
