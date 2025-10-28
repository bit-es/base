<?php

namespace Bites\Mes\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'x_operations';

    protected $guarded = [];
}
