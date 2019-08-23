<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'role' => 'user'
    ];

    public function member(){
        return $this->hasMany(Member::class); 
    }

    public function photo(){
        return $this->hasManyThrough(Photo::class, Member::class);
    }

    public function doctor(){
        return $this->hasOne(Doctor::class); 
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
