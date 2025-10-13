<?php

namespace Bites\Qas\Models;

use Illuminate\Database\Eloquent\Model;

class NonConformity extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'q_non_conformities';

    protected $guarded = [];
}
