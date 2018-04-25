<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $with=['smsimages','sender'];
    public function sender(){
    	return $this->belongsTo('App\User','sender_id','id');
    	}
    public function chat(){
        return $this->BelongsTo('App\Chat');
        }
        public function smsimages(){
        	return $this->hasMany('App\Smsimage','message_id','id');
        }

}
