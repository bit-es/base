<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Methodology extends Model
{
    protected $fillable = [
        'methodology',
        'purpose',
        'brief_explanation',
        'needs_form',
        'needs_report',
        'typical_record_type',
        'example_template_name',
        'external_url',
    ];

    public function runs(): HasMany
    {
        return $this->hasMany(ContinuousImprovementRun::class, 'methodology_id');
    }
}
