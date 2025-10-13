<?php

namespace Bites\Hrm\Models;

use Bites\Core\Models\Request;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'h_leave_requests';

    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function Request()
    {
        return $this->morphOne(Request::class, 'subject');
    }
}
