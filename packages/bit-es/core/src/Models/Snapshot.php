<?php
namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Snapshot extends Model
{
    protected $table = 'u_snapshots';

    protected $fillable = ['snapshotable_type','snapshotable_id','setting_id','title','data'];
    protected $casts = ['data' => 'array'];
    public function snapshotable(): MorphTo { return $this->morphTo(); }
    public function setting() { return $this->belongsTo(Setting::class); }
}

















































































