<?php

namespace Bites\Core\Models\Csa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Event extends Model
{
    protected $table = 'u_events';

    protected $fillable = ['eventable_type', 'eventable_id', 'setting_id', 'title', 'description', 'start_at', 'end_at'];

    protected $casts = ['start_at' => 'datetime', 'end_at' => 'datetime'];

    public function eventable(): MorphTo
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
