<?php

namespace Bites\Dms\Models;

use Bites\Core\Models\OrgUnit;
use Illuminate\Database\Eloquent\Model;

class DmsContainer extends Model
{
    protected $table = 'd_containers';
    protected $guarded = [];
    public function folders()
    {
        return $this->hasMany(DmsFolder::class, 'id');
    }
    public function files()
    {
        return $this->hasMany(DmsFile::class, 'id');
    }
    public function orgUnit()
    {
        return $this->belongsTo(OrgUnit::class, 'org_unit_id');
    }
}








































































