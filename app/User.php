<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','tel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
   /******************relations*************************************/
     public function products(){
      return $this->belongsToMany('App\Product');
    }
     public function sendedmessages(){
      return $this->belongsToMany('App\Message','messages','sender_id','id');
    }
     public function recivedmessages(){
      return $this->belongsToMany('App\Message','messages','reciver_id','id');
    }
}
