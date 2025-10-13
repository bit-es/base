<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Activity extends Model
{
    protected $table = 'u_activities';
    protected $fillable = ['workflow_id', 'name', 'description', 'metadata'];
    protected $casts = ['metadata' => 'array'];

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(Workflow::class);
    }
    
    public function request()
    {
        return $this->belongsTo(Request::class);
    }


    public function activityable(): MorphTo
    {
        return $this->morphTo();
    }
}
