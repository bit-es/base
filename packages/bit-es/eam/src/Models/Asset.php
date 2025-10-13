<?php

namespace Bites\Eam\Models;

use Bites\Hrm\Models\Staff;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use \Bites\Core\Traits\BitesModel;

    // use \Bites\Core\Traits\HasCategory;
    protected $table = 'a_assets';

    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
