<?php
namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Classify extends Model
{
    protected $table = 'u_classifies';

    protected $fillable = ['name','parent_id','classifiable_type','classifiable_id'];

    public function classifiable(): MorphTo { return $this->morphTo(); }
    public function parent() { return $this->belongsTo(self::class,'parent_id'); }
    public function children() { return $this->hasMany(self::class,'parent_id'); }
    public function scopeRoot($query) { return $query->whereNull('parent_id'); }
}















































































