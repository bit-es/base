<?php

namespace Bites\Eam\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssetType extends Model
{
    protected $guarded = [];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }

    public function inventoryItems(): BelongsToMany
    {
        return $this->belongsToMany(InventoryItem::class);
    }
}
