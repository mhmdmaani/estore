<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curr extends Model
{
    //
     public function products(){
      return $this->hasMany('App\Product','curr_id');
    }
}
