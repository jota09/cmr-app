<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    public $table = 'projects';

    public $fillable = [
        'id',
        'repository_id',
    ];

    // скрытые поля
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repository()
    {
        return $this->belongsTo(Repository::class, 'repository_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subject()
    {
        return $this->hasOne(Detail::class, "project_id","id");
    }
}
