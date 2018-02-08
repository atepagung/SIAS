<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail_category extends Model
{
    protected $table = 'mail_categories';

    protected $fillable = ['title'];

    public function mails()
    {
    	return $this->hasMany('App\Mail', 'mail_category_id');
    }
}
