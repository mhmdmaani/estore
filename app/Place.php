<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
     public function products(){
      return $this->hasMany('App\Product','place_id');
    }
}
