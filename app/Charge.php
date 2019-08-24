<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    public function schedule() {
        return $this->hasMany(Schedule::class);
    }
}
