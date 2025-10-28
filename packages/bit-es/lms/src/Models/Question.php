<?php

namespace Bites\Lms\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'l_questions';

    protected $guarded = [];
}
