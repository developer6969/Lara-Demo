<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
}
