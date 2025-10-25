<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Classify extends Model
{
    use \Bites\Core\Traits\HasExtAttributes;

    protected $table = 'u_classifies';

    protected $guarded = [];

    public function classifiable()
    {
        return $this->morphedByMany(Model::class, 'classifiable')
            ->withPivot('settings_id')
            ->withTimestamps();
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}
