<?php

namespace Bites\Eam\Models;

use Bites\Core\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InventoryItem extends Model
{
    protected $guarded = [];

    public function assetTypes(): BelongsToMany
    {
        return $this->belongsToMany(AssetType::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function contracts()
    {
        return $this->morphToMany(Contract::class, 'contractable');
    }
}
