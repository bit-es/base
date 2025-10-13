<?php

namespace Bites\Dms\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DmsFile extends Model
{
    protected $table = 'd_files';
    protected $guarded = [];
    public function container()
    {
        return $this->belongsTo(DmsContainer::class, 'd_container_id');
    }
    public function folder()
    {
        return $this->belongsTo(DmsFolder::class, 'd_folder_id');
    }
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}








































































