<?php

namespace Bites\Core\Models;

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

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
