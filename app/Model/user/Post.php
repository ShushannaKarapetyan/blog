<?php

namespace App\Model\user;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['id', 'title', 'subtitle', 'slug','body', 'image'];

    public function tags(){

        return $this->belongsToMany('App\Model\user\Tag','post_tags') -> withTimestamps();

    }

    public function categories(){

        return $this->belongsToMany('App\Model\user\Category','category_posts') -> withTimestamps();

    }



}
