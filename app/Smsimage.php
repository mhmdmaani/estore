<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smsimage extends Model
{
    //
    public function message(){
    	return $this->belongsTo('App\message','message_id','id');
    }
}
