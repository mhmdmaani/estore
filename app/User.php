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
        'name', 'email', 'password','tel','image',
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
      return $this->hasMany('App\Product');
    }
      public function chats(){
        return $this->belongsToMany('App\Chat');
    }
    public function savedProducts(){
      return $this->belongsToMany('App\Product','product_user','user_id','product_id');
  }
      public function messages(){
        return $this->hasMany('App\Message','sender_id','id');
    }
    public function categories(){
        return $this->belongsToMany('App\Category','category_user','user_id','category_id');
      }
}
