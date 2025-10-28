<?php

namespace Bites\Lms\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'l_quizzes';

    protected $guarded = [];
}
