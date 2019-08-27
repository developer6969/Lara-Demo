<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public function clinic() {
        return $this->belongsTo(Clinic::class);
    }
}
