<?php

namespace Bites\Erp\Models;

use Illuminate\Database\Eloquent\Model;

class CostElement extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'p_cost_elements';

    protected $guarded = [];
}
