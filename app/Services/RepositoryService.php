<?php

namespace App\Services;

use App\DTO\RepositoryDTO;
use App\Models\Repository;
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

    public function store($input)
    {
        $model = Repository::create($input);
        if(array_key_exists('rows', $input)) {
            $modelsAux = Row::find($input['rows']);
            $model->rows()->saveMany($modelsAux);
        }
        return $this->sendResponse(RepositoryDTO::instance()->load($model), 'Repository stored successfully');
    }

}
