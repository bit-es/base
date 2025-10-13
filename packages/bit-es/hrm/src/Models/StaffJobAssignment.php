<?php

namespace Bites\Hrm\Models;

use Illuminate\Database\Eloquent\Model;

class StaffJobAssignment extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'h_staff_job_assignments';

    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
