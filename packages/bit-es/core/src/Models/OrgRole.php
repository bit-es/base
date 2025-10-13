<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class OrgRole extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'c_org_roles';

    protected $guarded = [];

    public function orgUnit()
    {
        return $this->belongsTo(OrgUnit::class, 'org_unit_id');
    }

    public function turtlesAsSupplier()
    {
        return $this->hasMany(Turtle::class, 'supplier_id');
    }

    public function turtlesAsCustomer()
    {
        return $this->hasMany(Turtle::class, 'customer_id');
    }

    public function turtlesAsRole()
    {
        return $this->hasMany(Turtle::class, 'org_role_id');
    }
}
