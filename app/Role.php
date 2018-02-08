<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['title'];

    public function sub_roles()
    {
    	return $this->hasMany('App\Sub_role', 'role_id');
    }
}
