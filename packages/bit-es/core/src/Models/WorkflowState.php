<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowState extends Model
{
    protected $table = 'workflow_states';

    protected $guarded = [];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function assigneeRole()
    {
        return $this->belongsTo(OrgRole::class, 'assignee_role_id');
    }
}
