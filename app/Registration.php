<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
}
