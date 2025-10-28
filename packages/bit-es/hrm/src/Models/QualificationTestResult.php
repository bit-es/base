<?php

namespace Bites\Hrm\Models;

use Illuminate\Database\Eloquent\Model;

class QualificationTestResult extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'h_qualification_test_results';

    protected $guarded = [];
}
