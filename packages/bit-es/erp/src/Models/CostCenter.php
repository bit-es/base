<?php

namespace Bites\Erp\Models;

use App\Models\User;
use Bites\Core\Models\OrgUnit;
use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    use \Bites\Core\Traits\BitesModel;
    protected $table = 'p_cost_centers';
    protected $guarded = [];
    public function orgUnit()
    {
        return $this->belongsTo(OrgUnit::class, 'org_unit_id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}










































































