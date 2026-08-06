<?php

namespace Bites\Core\Models;

use Bites\Hrm\Models\WorkforcePlan;
use Bites\Hrm\Models\WorkforceTemplate;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'c_job_positions';

    protected $guarded = [];

    public function orgUnit()
    {
        return $this->belongsTo(OrgUnit::class, 'org_unit_id');
    }

    public function superior()
    {
        return $this->belongsTo(JobPosition::class, 'superior_id');
    }

    public static function resolveAndCreate(array $data): self
    {
        // Create JobPosition
        $jobPosition = self::create($data); // Create JobPosition

        $template = WorkforceTemplate::where('title', $data['title'])->first();

        WorkforcePlan::firstOrCreate( // Create WorkforcePlan
            [
                'org_unit_id' => $data['org_unit_id'],
                'title' => $data['title'],
                'job_title_id' => $template ? $template->id : null,
            ],
            [
                'required_quantity' => 0,
            ]
        );

        return $jobPosition;
    }
}
