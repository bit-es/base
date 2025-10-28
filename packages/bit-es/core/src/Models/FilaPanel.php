<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class FilaPanel extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'c_panels';

    protected $guarded = [];
}
