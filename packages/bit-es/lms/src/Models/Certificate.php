<?php

namespace Bites\Lms\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'l_certificates';

    protected $guarded = [];
}
