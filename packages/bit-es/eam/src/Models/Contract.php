<?php

namespace Bites\Eam\Models;

use Bites\Core\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    protected $guarded = [];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function assets()
    {
        return $this->morphedByMany(Asset::class, 'contractable');
    }

    public function inventoryItems()
    {
        return $this->morphedByMany(InventoryItem::class, 'contractable');
    }
}
