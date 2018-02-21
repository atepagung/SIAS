<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail_history extends Model
{
    protected $table = 'mail_histories';

    protected $fillable = ['mail_id', 'note', 'pengirim', 'penerima', 'notif'];

    public function mail()
    {
    	return $this->belongsTo('App\Mail', 'mail_id');
    }

    public function user_pengirim()
    {
    	return $this->belongsTo('App\User', 'pengirim');
    }

    public function user_penerima()
    {
    	return $this->belongsTo('App\User', 'penerima');
    }
}
