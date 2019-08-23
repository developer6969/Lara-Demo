<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialisation extends Model
{
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
}
