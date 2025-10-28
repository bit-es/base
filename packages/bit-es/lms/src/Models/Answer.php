<?php

namespace Bites\Lms\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'l_answers';

    protected $guarded = [];
}
