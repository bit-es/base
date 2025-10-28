<?php

namespace Bites\Hrm\Models;

use App\Models\User;
use Bites\Core\Models\JobPosition;
use Bites\Core\Models\OrgUnit;
use Bites\Erp\Models\CostCenter;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'h_staff';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class, 'cost_center_id');
    }

    public function orgUnit()
    {
        return $this->belongsTo(OrgUnit::class, 'org_unit_id');
    }

    public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class, 'job_position_id');
    }
}
