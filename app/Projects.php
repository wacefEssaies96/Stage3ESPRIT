<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function file()
    {
        return $this->hasOne(File::class);
    }

    public function adminProClient()
    {
        return $this->hasOne(AdminPro::class);
    }
    public function adminPro()
    {
        return $this->hasOne(AdminPro::class);
    }
}
