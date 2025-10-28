<?php

namespace Bites\Core\Models\Csa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Task extends Model
{
    protected $table = 'u_tasks';

    protected $fillable = ['taskable_type', 'taskable_id', 'setting_id', 'title', 'description', 'status', 'due_at'];

    protected $casts = ['due_at' => 'datetime'];

    public function taskable(): MorphTo
    {
        return $this->morphTo();
    }

    public function classify()
    {
        return $this->belongsTo(Classify::class, 'classify_id');
    }

    public function setting()
    {
        return $this->belongsTo(Classify::class, 'setting_id');
    }
}
