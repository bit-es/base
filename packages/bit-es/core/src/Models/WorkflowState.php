<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowState extends Model
{
    protected $table = 'c_nodes';

    protected $guarded = [];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function assigneeRole()
    {
        return $this->belongsTo(OrgRole::class, 'assignee_role_id');
    }
        public function transitions()
    {
        return $this->hasMany(WorkflowTransition::class, 'from_state_id');
    }
}
