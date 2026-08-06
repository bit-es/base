<?php

namespace Bites\Hrm\Models;

use Bites\Core\Models\JobPosition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkforceTemplate extends Model
{
    protected $fillable = [
        'title',
        'description',
        'attributes',
        'masco_code',
    ];

    protected $casts = [
        'attributes' => 'array', // Automatically cast JSON to array
    ];

    public function workforcePlans(): HasMany
    {
        return $this->hasMany(WorkforcePlan::class, 'job_title_id');
    }

    public function jobPositions(): HasMany
    {
        return $this->hasMany(JobPosition::class, 'job_title_id');
    }
}
