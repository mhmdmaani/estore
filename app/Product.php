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
     public function messages(){
      return $this->hasMany('App\Message','product_id','id');
    }
}
