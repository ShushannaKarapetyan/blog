<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['id', 'name', 'slug'];

    public function posts(){

        return $this->belongsToMany('App\Model\user\Post','post__tags');

    }

}
