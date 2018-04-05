<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    public function product(){
      return $this->BelongsTo('App\Product','product_id','id');
    }
}
