<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public function schedule() {
        return $this->hasMany(Schedule::class);
    }
}
