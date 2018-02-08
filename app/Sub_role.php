<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_role extends Model
{
    protected $table = 'sub_roles';

    protected $fillable = ['title', 'role_id'];

    public function users()
    {
    	return $this->hasMany('App\User', 'sub_role_id');
    }

    public function role()
    {
    	return $this->belongsTo('App\Role', 'role_id');
    }
}
