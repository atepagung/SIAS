<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_category extends Model
{
    protected $table = 'file_categories';

    protected $fillable = ['title'];

    public function files()
    {
    	return $this->hasMany('App\File', 'file_category_id');
    }
}
