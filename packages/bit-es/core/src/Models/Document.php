<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $table = 'c_docs';

    protected $guarded = [];

    public function turtlesAsSop()
    {
        return $this->hasMany(Turtle::class, 'sop_id');
    }

    public function turtlesAsWi()
    {
        return $this->hasMany(Turtle::class, 'wi_id');
    }

    public function turtlesAsForm()
    {
        return $this->hasMany(Turtle::class, 'form_id');
    }
}
