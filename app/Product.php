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
      return $this->belongsTo('App\User','user_id');
    }
     public function tag(){
      return $this->belongsTo('App\Tag','tag_id');
    }
     public function curr(){
      return $this->belongsTo('App\Curr','curr_id');
    }
     public function media(){
      return $this->hasMany('App\Media','product_id');
    }
}
