<?php

namespace Bites\Lms\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'l_modules';

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
