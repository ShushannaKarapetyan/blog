<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['id', 'name','for'];

    public function roles(){

        return $this->belongsToMany('App\Model\admin\Permission','permission_role')->withTimestamps();
    }
}
