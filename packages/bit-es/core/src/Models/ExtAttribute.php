<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class ExtAttribute extends Model
{
    protected $table = 'ext_attributes';

    protected $fillable = ['key', 'value'];

    protected $casts = ['value' => 'json'];

    public function attributable()
    {
        return $this->morphTo();
    }
}
