<?php

namespace Bites\Eam\Models;

use Bites\Erp\Models\CostCenter;
use Illuminate\Database\Eloquent\Model;

class MaintenancePlan extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'a_maintenance_plans';

    protected $guarded = [];

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class, 'cost_center_id');
    }
}
