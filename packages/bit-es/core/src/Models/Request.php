<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'c_requests';

    protected $guarded = [];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function currentState()
    {
        return $this->belongsTo(WorkflowState::class, 'current_state_id');
    }

    public function subject()
    {
        return $this->morphTo();
    }

    public function initiator()
    {
        return $this->belongsTo(OrgRole::class, 'initiator_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    // public function tasks()
    // {
    //     return $this->hasMany(Task::class, 'workflow_instance_id');
    // }
}
