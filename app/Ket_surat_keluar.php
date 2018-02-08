<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ket_surat_keluar extends Model
{
    protected $table = 'Ket_Surat_Keluar';

    public function files()
    {
    	return $this->hasMany('App\File', 'ket_Surat_Keluar_id');
    }
}
