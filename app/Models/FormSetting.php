<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSetting extends Model
{
    protected $fillable = ['name', 'schema'];

    protected $casts = [
        'schema' => 'array',
    ];
}
