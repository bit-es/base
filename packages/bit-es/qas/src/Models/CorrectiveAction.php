<?php

namespace Bites\Qas\Models;

use Illuminate\Database\Eloquent\Model;

class CorrectiveAction extends Model
{
    use \Bites\Core\Traits\BitesModel;

    protected $table = 'q_corrective_actions';

    protected $guarded = [];
}
