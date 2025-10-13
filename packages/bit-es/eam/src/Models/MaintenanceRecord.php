<?php

namespace Bites\Eam\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRecord extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'a_maintenance_records';

    protected $guarded = [];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
