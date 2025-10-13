<?php
namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Event extends Model
{
    protected $table = 'u_events';

    protected $fillable = ['eventable_type','eventable_id','setting_id','title','description','start_at','end_at'];
    protected $casts = ['start_at' => 'datetime','end_at' => 'datetime'];
    public function eventable(): MorphTo { return $this->morphTo(); }
    public function setting() { return $this->belongsTo(Setting::class); }
}

















































































