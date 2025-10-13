<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Metric extends Model
{
    protected $table = 'u_metrics';

    protected $fillable = ['metricable_type', 'metricable_id', 'setting_id', 'key', 'value', 'recorded_at'];

    protected $casts = ['recorded_at' => 'datetime'];

    public function metricable(): MorphTo
    {
        return $this->morphTo();
    }

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
