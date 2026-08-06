<?php

namespace Bites\Core\Models\Aea;

use Illuminate\Database\Eloquent\Model;

class AssetAttribute extends Model
{
    // protected $table = 'ext_attributes';

    protected $fillable = ['key', 'value'];

    protected $casts = ['value' => 'json'];

    public function attributable()
    {
        return $this->morphTo();
    }
}
