<?php

namespace Bites\Qas\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'q_inspections';

    protected $guarded = [];
}
