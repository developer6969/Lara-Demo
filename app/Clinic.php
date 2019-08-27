<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function schedule() {
        return $this->hasMany(Schedule::class);
    }

    public function clinicdoc() {
        return $this->hasMany(Clinicdoc::class);
    }

    public function doctor() {
        return $this->hasManyThrough(Doctor::class, Clinicdoc::class);
    }

    public function facility() {
        return $this->hasMany(Facility::class);
    }
}
