<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    public function friends()
    {

        return $this->belongsToMany(User::class, 'friend_user','user_id','friend_id')->withPivot('isfriend');

    }

    public function unknown($id){
        return $this->hasMany(User::class)->wherePivot('friend_id', $id);
    }

    public function bio()
    {
        return $this->hasOne(Bio::class);
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }


    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
        'isapproved',
        'dob'
    ];

    

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
