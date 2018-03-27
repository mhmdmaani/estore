<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
     public function products(){
      return $this->hasMany('App\Product','tag_id');
    }
}
