<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public function sender(){
    	return $this->BelongsTo('App\User','sender_id','id');
    	}
          public function chat(){
        return $this->BelongsTo('App\Chat','chat_id','id');
        }      
}
