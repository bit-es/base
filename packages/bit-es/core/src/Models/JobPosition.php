<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    use \Bites\Core\Traits\BitesModel;

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
}
