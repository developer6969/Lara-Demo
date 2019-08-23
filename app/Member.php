<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function getAgeAttribute($value)
    {
        // $now = date('Y');
        // $year = substr($this.dob, 5);
        // if($now > $year) {
        //     return $now - $year;
        // }
        return $value;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class); 
    }
}
