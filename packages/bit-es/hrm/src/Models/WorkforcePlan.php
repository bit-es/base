<?php

namespace Bites\Hrm\Models;

use Bites\Core\Models\JobPosition;
use Bites\Core\Models\OrgUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkforcePlan extends Model
{
    protected $fillable = [
        'org_unit_id',
        'title',
        'job_title_id',
        'required_quantity',
    ];

    // Relationships
    public function orgUnit(): BelongsTo
    {
        return $this->belongsTo(OrgUnit::class);
    }

    public function workforceTemplate(): BelongsTo
    {
        return $this->belongsTo(WorkforceTemplate::class, 'job_title_id');
    }

    public function jobPositions(): HasMany
    {
        return $this->hasMany(JobPosition::class, 'org_unit_id', 'org_unit_id')
            ->whereColumn('title', 'workforce_plans.title');
    }
}
