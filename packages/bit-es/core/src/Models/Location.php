<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'locations';

    protected $guarded = [];
}
