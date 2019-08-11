<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['id', 'name'];

    public function permissions(){

        return $this->belongsToMany('App\Model\admin\Permission','permission_role')->withTimestamps();
    }

    public function admin(){

        return $this->belongsToMany('App\Model\admin\Admin','admin_roles')->withTimestamps();
    }

}
