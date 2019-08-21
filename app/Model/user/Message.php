<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user(){

        return $this->belongsTo('App\model\user\User');
    }


}
