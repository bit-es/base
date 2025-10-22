<?php

namespace Bites\Eam\Models;

use Bites\Core\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPlan extends Model
{
    protected $guarded = [];

    public function instruction(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'instruction_doc_id');
    }
}
