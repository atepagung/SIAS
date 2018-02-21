<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code_surat extends Model
{
    protected $table = 'code_surat';
    
    protected $fillable = ['code', 'judul_naskah'];
}
