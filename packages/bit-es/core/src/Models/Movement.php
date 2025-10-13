<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'movements';

    protected $guarded = [];
}
