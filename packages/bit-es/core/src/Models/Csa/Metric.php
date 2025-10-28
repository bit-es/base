<?php

namespace Bites\Core\Models\Csa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Metric extends Model
{
    protected $table = 'u_metrics';

    protected $fillable = [
        'metricable_type',
        'metricable_id',
        'classify_id',
        'key',
        'value',
    ];

    protected $casts = ['recorded_at' => 'datetime'];

    public function metricable(): MorphTo
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
