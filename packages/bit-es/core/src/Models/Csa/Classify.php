<?php

namespace Bites\Core\Models\Csa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Classify extends Model
{
    use \Bites\Core\Traits\HasExtAttributes;

    protected $table = 'u_classifies';

    protected $guarded = [];

    // public function classifiable()
    // {
    //     return $this->morphedByMany(Model::class, 'classifiable')
    //         ->withPivot('settings_id')
    //         ->withTimestamps();
    // }

    // public function parent()
    // {
    //     return $this->belongsTo(self::class, 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(self::class, 'parent_id');
    // }

    // public function scopeRoot($query)
    // {
    //     return $query->whereNull('parent_id');
    // }

    public function classifiable(): MorphTo
    {
        return $this->morphTo();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function setting()
    {
        return $this->hasOne(Setting::class);
    }

    public function metrics()
    {
        return $this->hasMany(Metric::class);
    }

    public function getFullPathAttribute(): string
    {
        if ($this->parent) {
            return $this->parent->full_path.' > '.$this->name;
        }

        return $this->name;
    }

    public static function treeOptions(?string $type = null): array
    {
        $query = static::query()->with('children');
        if ($type) {
            $query->where('classifiable_type', $type);
        }
        $roots = $query->whereNull('parent_id')->get();

        $build = function ($nodes) use (&$build) {
            $options = [];
            foreach ($nodes as $node) {
                if ($node->children->isNotEmpty()) {
                    $options[$node->name] = $build($node->children);
                } else {
                    $options[$node->id] = $node->name;
                }
            }

            return $options;
        };

        return $build($roots);
    }
}
