<?php

namespace Bites\Eam\Models;

use Bites\Core\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use \Bites\Core\Traits\HasCategories, \Bites\Core\Traits\HasClassStructuredAttributes;

    protected $guarded = [];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function assetType(): BelongsTo
    {
        return $this->belongsTo(AssetType::class);
    }

    public function contracts()
    {
        return $this->morphToMany(Contract::class, 'contractable');
    }

    public static function resolveAndCreate(array $data): self
    {
        $statusData = $data['status'] ?? 'Commissioning';
        $data['status'] = $statusData;

        $categoryData = $data['category'] ?? null;
        unset($data['category'], $data['subcategory'], $data['categories']); // Clean up

        $asset = self::create($data);
        if ($categoryData) {
            $asset->addCategoryFromJson(['category' => $categoryData]);
        } // Attach category if present

        return $asset;
    }
}
