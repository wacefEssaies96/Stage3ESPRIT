<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }
}
