<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    public function products(){
      return $this->BelongsTo('App\Product','id','product_id');
    }
}
