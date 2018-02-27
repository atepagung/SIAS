<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function createMail()
    {
    	$penerima = \App\Role::with('sub_roles')->with('sub_roles.users')->get();
        $files = \App\File::with('uploader')->with('file_category')
                    ->whereExists(function($query) {
                        $query->select(DB::raw(1))
                            ->from('files_access')
                            ->whereRaw('files_access.user_id = '.Auth::id().' AND files_access.file_id = files.id');
                    })->get();
        $mail_category = \App\Mail_category::all();

    	return view('mail.create-mail', ['penerima' => $penerima, 'files' => $files, 'mail_category' => $mail_category, 'title' => 'Buat Pesan']);
    }

    public function createFileMail($id)
    {
        $penerima = \App\Role::with('sub_roles')->with('sub_roles.users')->get();
        $mail_category = \App\Mail_category::all();

        $file = \App\File::find($id);

        return view('mail.create-file-mail', ['penerima' => $penerima, 'file' => $file, 'mail_category' => $mail_category, 'title' => 'Buat Pesan']);
    }

    public function sendMail(Request $request)
    {

        $validatedData = $request->validate([
            'penerima' => 'required',
            'isi_pesan' => 'required',
            'subject' => 'required',
        ]);

    	try {
    		DB::beginTransaction();

    		$id = \App\Mail::create([
    			'from' => Auth::id(),
    			'subject' => $request->input('subject'),
    			//'mail_category_id' => 1
    		]);



    		foreach ($request->input('penerima') as $penerima) {
				\App\Mail_history::create([
					'mail_id' => $id->id,
					'note' => $request->input('isi_pesan'),
					'pengirim' => Auth::id(),
					'penerima' => $penerima
				]);

                if (!empty($request->input('fileInput'))) {
                    foreach ($request->input('fileInput') as $file_id) {
                        \App\File_access::firstOrCreate(['user_id' => $penerima, 'file_id' => $file_id]);

                        try {
                            $file_mail = \App\Mail::find($id->id);

                            $file_mail->files()->attach($file_id);    
                        } catch (Exception $e) {
                            
                        }
                    }
                }
    		}

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		//echo "Message : ".$e->getMessage();
            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
    	}
        return redirect()->route('pesan-keluar');
    }

    public function pesan_masuk()
    {
        $mails = \App\Mail::with('user')->with('mail_histories')->with('files')->whereExists(function ($query) {
            $query->select(DB::raw(1))->from('mail_histories')->whereRaw('mail_histories.penerima = '.Auth::id().' AND mail_histories.mail_id = mails.id');
        })->get();

        //dd($mails->toArray());

        return view('mail.show-pesan-masuk', ['mails' => $mails, 'title' => 'Pesan Masuk']);
    }

    public function pesan_keluar()
    {
        $mails = \App\Mail::with('user')->with('mail_histories')->with('mail_histories.user_penerima')->with('files')->whereExists(function ($query) {
            $query->select(DB::raw(1))->from('mail_histories')->whereRaw('mail_histories.pengirim = '.Auth::id().' AND mail_histories.mail_id = mails.id');
        })->where('from', Auth::id())->get();
        //dd($mails->toArray());

        return view('mail.show-pesan-terkirim', ['mails' => $mails, 'title' => 'Pesan Keluar']);
    }

    public function detailMail($id)
    {
        $mail_histories = \App\Mail_history::with('user_penerima')->with('user_pengirim')->where('mail_id', $id)->where('penerima', Auth::id())->get();

        $subject = \App\Mail::find($id)->subject;

        //dd($subject);

        return view('mail.detail-mail', ['mail_histories' => $mail_histories, 'subject' => $subject, 'title' => 'Detail Pesan']);
    }
}
