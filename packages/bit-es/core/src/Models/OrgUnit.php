<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class OrgUnit extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'c_org_units';

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function turtles()
    {
        return $this->hasMany(Turtle::class);
    }

    public function roles()
    {
        return $this->hasMany(OrgRole::class);
    }

    public function parent()
    {
        return $this->belongsTo(OrgUnit::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(OrgUnit::class, 'parent_id');
    }
}
