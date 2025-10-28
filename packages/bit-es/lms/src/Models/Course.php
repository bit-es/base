<?php

namespace Bites\Lms\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'l_courses';

    protected $guarded = [];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
