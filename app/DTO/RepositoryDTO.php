<?php

namespace App\DTO;

/**
 * Class RepositoryDTO
 * @package App\Models\DTO
 * @property int $id
 * @property string $title
 *
 */
class RepositoryDTO extends AbstractPublicDTO
{
    /**
     * @param \App\Models\Repository $model
     * @return $this
     * @throws \Exception
     */
    public function load($model,$meta = null)
    {

        $modelDTO = $this->loadFullModel($model);

        switch ($meta){
            case 'subjects':
                $modelDTO->subjects = $model->subjects->map(function($model) {
                    return $this->loadFullModel($model);
                });
                break;
            case 'projects':
                $modelDTO->projects = $model->projects->map(function($model) {
                    return $this->loadFullModel($model);
                });
                break;
            default:
        }




        return $modelDTO;
    }
}
