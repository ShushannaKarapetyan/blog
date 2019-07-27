<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['id', 'title', 'subtitle', 'slug','body', 'image'];




}
