<?php

namespace Bites\Qas\Models;

use Bites\Hrm\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RunInitiative extends Model
{
    protected $table = 'q_initiatives';
    
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
        return $this->belongsTo(Methodology::class);
    }

    public function initiator(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'initiator_id');
    }
}
