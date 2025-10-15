<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RunInitiative extends Model
{
    protected $fillable = [
        'methodology_id',
        'initiator_id',
        'title',
        'description',
        'status',
        'inputs',
        'outputs',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'inputs' => 'array',
        'outputs' => 'array',
        'started_at' => 'date',
        'completed_at' => 'date',
    ];

    public function methodology(): BelongsTo
    {
        return $this->belongsTo(ContinuousImprovementMethodology::class);
    }

    public function initiator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'initiator_id');
    }
}
