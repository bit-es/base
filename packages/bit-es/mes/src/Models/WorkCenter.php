<?php

namespace Bites\Mes\Models;

use Illuminate\Database\Eloquent\Model;

class WorkCenter extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'x_work_centers';

    protected $guarded = [];
}
