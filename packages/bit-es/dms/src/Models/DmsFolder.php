<?php

namespace Bites\Dms\Models;

use Illuminate\Database\Eloquent\Model;

class DmsFolder extends Model
{
    protected $table = 'd_folders';
    protected $guarded = [];
    public function container()
    {
        return $this->belongsTo(DmsContainer::class, 'd_container_id');
    }
    public function files()
    {
        return $this->hasMany(DmsFile::class, 'id');
    }
}













































































