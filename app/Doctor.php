<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function qualification(){
        return $this->belongsTo(Qualification::class); 
    }

    public function specialisation(){
        return $this->belongsTo(Specialisation::class); 
    }

    public function experience(){
        return $this->belongsTo(Experience::class); 
    }

    public function award(){
        return $this->belongsTo(Award::class); 
    }

    public function service(){
        return $this->belongsTo(Service::class); 
    }

    public function registration(){
        return $this->belongsTo(Registration::class); 
    }

    public function membership(){
        return $this->belongsTo(Membership::class); 
    }

    public function schedule() {
        return $this->hasMany(Schedule::class);
    }

    public function clinicdoc() {
        return $this->hasMany(Clinicdoc::class);
    }
}
