<?php

namespace Bites\Core\Traits;

use Bites\Core\Models\ExtAttribute;

trait HasExtAttributes
{
    public function extAttributes()
    {
        return $this->morphMany(ExtAttribute::class, 'attributable');
    }

    public function getExtAttribute(string $key, $default = null)
    {
        return $this->extAttributes->firstWhere('key', $key)?->value ?? $default;
    }

    public function setExtAttribute(string $key, $value): void
    {
        $attribute = $this->extAttributes()->firstOrNew(['key' => $key]);
        $attribute->value = $value;
        $attribute->save();
    }
}
