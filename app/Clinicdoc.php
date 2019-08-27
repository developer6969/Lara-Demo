<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinicdoc extends Model
{
    // CLINIC
    public function clinic() {
        return $this->belongsTo(Clinic::class);
    }

    public function facility() {
        return $this->hasManyThrough(Facility::class, Clinic::class);
    }

    public function schedule() {
        return $this->hasManyThrough(Schedule::class, Clinic::class);
    }


    // DOCTOR
    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function qualification(){
        return $this->hasManyThrough(Qualification::class, Doctor::class);
    }

    public function specialisation(){
        return $this->hasManyThrough(Specialisation::class, Doctor::class);
    }

    public function experience(){
        return $this->hasManyThrough(Experience::class, Doctor::class);
    }

    public function award(){
        return $this->hasManyThrough(Award::class, Doctor::class);
    }

    public function service(){
        return $this->hasManyThrough(Service::class, Doctor::class);
    }

    public function membership(){
        return $this->hasManyThrough(Membership::class, Doctor::class);
    }

    public function registration(){
        return $this->hasManyThrough(Registration::class, Doctor::class);
    }
}
