<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     public function place(){
      return $this->belongsTo('App\Place','place_id');
    }
     public function category(){
      return $this->belongsTo('App\Category','category_id');
    }
     public function user(){
      return $this->belongsTo('App\User');
    }
     public function tags(){
      return $this->belongsToMany('App\Tag','product_tag','product_id','tag_id');
    }
     public function curr(){
      return $this->belongsTo('App\Curr','curr_id');
    }
     public function media(){
      return $this->hasMany('App\Media','product_id');
    }
     public function chats(){
      return $this->hasMany('App\Chat');
    }
    public function favusers(){
      return $this->belongsToMany('App\User','product_user','product_id','user_id');
  }
  public function isfav($user) {
    return $this->favusers->contains('user_id',$user->id);
}
}
