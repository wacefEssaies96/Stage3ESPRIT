<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPro extends Model
{
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Projects::class);
    }
    public function projet()
    {
        return $this->belongsTo(Projects::class);
    }
}