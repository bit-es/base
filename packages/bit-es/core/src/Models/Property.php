<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Property extends Model
{
    protected $table = 'u_properties';

    protected $fillable = ['propertable_type', 'propertable_id', 'setting_id', 'key', 'value'];

    public function propertable(): MorphTo
    {
        return $this->morphTo();
    }

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
