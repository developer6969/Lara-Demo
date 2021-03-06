<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function member()
    {
        return $this->hasOne(Member::class);
    }
}
