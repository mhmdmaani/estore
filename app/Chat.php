<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    protected $with=['messages'];
    public function users(){
    	return $this->belongsToMany('App\User');
    }
    public function product(){
    	return $this->belongsTo('App\product','product_id','id');
    }
      public function messages(){
    	return $this->hasMany('App\Message');
    }
}
