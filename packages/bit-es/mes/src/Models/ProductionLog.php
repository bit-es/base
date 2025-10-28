<?php

namespace Bites\Mes\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionLog extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'x_production_logs';

    protected $guarded = [];
}
