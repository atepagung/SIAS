<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_access extends Model
{
    protected $table = 'files_access';

    protected $fillable = ['user_id', 'file_id'];
}
