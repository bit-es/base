<?php

namespace Bites\Eam\Models;

use Bites\Core\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkOrder extends Model
{
    protected $guarded = [];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
