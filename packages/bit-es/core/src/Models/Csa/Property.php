<?php

namespace Bites\Core\Models\Csa;

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

    public function classify()
    {
        return $this->belongsTo(Classify::class, 'classify_id');
    }

    public function setting()
    {
        return $this->belongsTo(Classify::class, 'setting_id');
    }
}
