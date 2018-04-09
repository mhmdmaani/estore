<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public function sender(){
    	return $this->BelongsTo('App\User','sender_id','id');
    	}
    public function reciver(){
    	return $this->BelongsTo('App\User','reciver_id','id');
    	}
    public function product(){
    	return $this->BelongsTo('App\Product','product_id','id');
    	}
}
