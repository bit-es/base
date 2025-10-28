<?php

namespace Bites\Lms\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'l_quiz_attempts';

    protected $guarded = [];
}
