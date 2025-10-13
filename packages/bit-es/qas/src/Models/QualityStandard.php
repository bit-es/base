<?php

namespace Bites\Qas\Models;

use Illuminate\Database\Eloquent\Model;

class QualityStandard extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'q_quality_standards';

    protected $guarded = [];
}
