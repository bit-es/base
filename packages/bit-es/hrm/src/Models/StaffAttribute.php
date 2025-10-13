<?php

namespace Bites\Hrm\Models;

use Illuminate\Database\Eloquent\Model;

class StaffAttribute extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'h_staff_attributes';

    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
