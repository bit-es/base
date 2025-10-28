<?php

namespace Bites\Mes\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionOrder extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'x_production_orders';

    protected $guarded = [];
}
