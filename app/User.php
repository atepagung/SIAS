<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    protected $fillable = ['username', 'password', 'name', 'sub_role_id'];

    public function pesan_masuk()
    {
        return $this->hasMany('App\Mail_history', 'pengirim');
    }

    public function pesan_keluar()
    {
        return $this->hasMany('App\Mail_history', 'penerima');
    }

    public function sub_role()
    {
        return $this->belongsTo('App\Sub_role', 'sub_role_id');
    }

    public function files_access()
    {
        return $this->belongsToMany('App\File', 'files_access', 'user_id', 'file_id');
    }

    public function files_upload()
    {
        return $this->hasMany('App\File', 'uploader');
    }
}
