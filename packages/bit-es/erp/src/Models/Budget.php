<?php

namespace Bites\Erp\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use \Bites\Core\Traits\BitesModel;
    protected $table = 'p_budgets';
    protected $guarded = [];
    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class);
    }
}
















































































