<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    
    protected $fillable = ['nomor_surat', 'title','location', 'file_category_id', 'uploader', 'description', 'ket_surat_keluar_id'];

    public function mails()
    {
        return $this->belongsToMany('App\Mail', 'file_mail', 'file_id', 'mail_id');
    }

    public function file_category()
    {
        return $this->belongsTo('App\File_category', 'file_category_id');
    }

    public function files_access()
    {
        return $this->belongsToMany('App\User', 'files_access', 'file_id', 'user_id');
    }

    public function uploader()
    {
        return $this->belongsTo('App\User', 'uploader');
    }

    public function ket_Surat_Keluar()
    {
        return $this->belongsTo('App\Ket_surat_seluar', 'ket_surat_keluar_id');
    }
}
