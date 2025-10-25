<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowTransition extends Model
{
    protected $table = 'c_transitions';

    protected $guarded = [];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function fromState()
    {
        return $this->belongsTo(WorkflowState::class, 'from_state_id');
    }

    public function toState()
    {
        return $this->belongsTo(WorkflowState::class, 'to_state_id');
    }
}
