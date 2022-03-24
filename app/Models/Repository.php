<?php

namespace App\Models;

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
}
