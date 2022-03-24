<?php

namespace App\Models;

use App\DTO\RepositoryDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repository extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    public $table = 'repositories';

    public $fillable = [
        'id',
    ];

    // campos ocultos metadata
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class,'repository_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class,'repository_id', 'id');
    }

    public function getSubjects($repositoryID)
    {
        $modelQuery = self::where('id', '=', "$repositoryID")->orderBy('id');
        $model = $modelQuery->get()
            ->map(function ($model) {
                return RepositoryDTO::instance()->load($model,'subjects');
            });

        return [
            'model' => $model
        ];
    }

    public function showProjects($repositoryID)
    {
        $modelQuery = self::where('id', '=', "$repositoryID")->orderBy('id');
        $model = $modelQuery->get()
            ->map(function ($model) {
                return RepositoryDTO::instance()->load($model,'subjects');
            });

        return [
            'model' => $model
        ];
    }
}
