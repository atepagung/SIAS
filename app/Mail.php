<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $table = 'mails';

    protected $fillable = ['from', 'subject'];

    public function files()
    {
    	return $this->belongsToMany('App\File', 'file_mail', 'mail_id', 'file_id');
    }

    public function mail_histories()
    {
    	return $this->hasMany('App\Mail_history', 'mail_id');
    }

    public function mail_category()
    {
    	return $this->belongsTo('App\Mail_category', 'mail_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'from');
    }
}
