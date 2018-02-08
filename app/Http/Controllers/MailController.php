<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function deleteSomeMail(Request $request)
    {
    	try {
    		DB::beginTransaction();

    		foreach ($request->input('mail') as $mail_id) {
    			\App\Mail_history::where('mail_id', $mail_id)
    				->where(function($query) {
    					$query->where('pengirim', Auth::id())->orWhere('penerima', Auth::id());
    				})->update(['hapus'] => 1);
    		}

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		echo 'Message : '.$e->getMessage();
    	}

    	die();
    }

    public function markSomeMail(Request $request)
    {
    	try {
    		DB::beginTransaction();

			foreach ($request->input('mail') as $mail_id) {
    			\App\Mail_history::where('mail_id', $mail_id)
    				->where(function($query) {
    					$query->where('pengirim', Auth::id())->orWhere('penerima', Auth::id());
    				})->update(['mark'] => 1);
    		}    		

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		echo "Message : ".$e->getMessage();
    	}
    }

    public function unmarkSomeMail(Request $request)
    {
    	try {
    		DB::beginTransaction();

			foreach ($request->input('mail') as $mail_id) {
    			\App\Mail_history::where('mail_id', $mail_id)
    				->where(function($query) {
    					$query->where('pengirim', Auth::id())->orWhere('penerima', Auth::id());
    				})->update(['mark'] => 0);
    		}    		

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		echo "Message : ".$e->getMessage();
    	}
    }

    public function deleteMail($id)
    {
    	try {
    		DB::beginTransaction();

    		\App\Mail_history::where('mail_id', $id)
    			->where(function($query) {
    				$query->where('pengirim', Auth::id())->orWhere('penerima', Auth::id());
    			})->update(['hapus'] => 1);

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		echo 'Message : '.$e->getMessage();
    	}

    	die();
    }

    public function createMail()
    {
    	$penerima = \App\Role::with('sub_roles')->with('sub_roles.users')->get();

    	dd($penerima->toArray());
    }

    public function sendMail(sendMail $request)
    {
    	try {
    		DB::beginTransaction();

    		$mail_id = \App\Mail::insertGetId([
    			'from' => Auth::id(),
    			'subject' => $request->input('subject'),
    			'mail_category_id' => $request->input('mail_category')
    		]);

    		foreach ($request->input('kepada') as $penerima) {
				\App\Mail_history::insert([
					'mail_id' => $mail_id,
					'note' => $request->input('note'),
					'pengirim' => Auth::id(),
					'penerima' => $penerima
				]);
				foreach ($request->input('file_ids') as $file_id) {
					DB::table('files_access')->firstOrCreate(['user_id' => $penerima, 'file_id' => $file_id]);
				}
    		}

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		echo "Message : ".$e->getMessage();
    	}
    }
}
