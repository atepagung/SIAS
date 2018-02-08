<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Mail;

class InboxController extends Controller
{
    public function index()
    {
    	$mail = Mail::where('mail_histories.penerima', Auth::id())
    		->distinct()
    		->orderBy('updated_at', 'desc')
    		->get();
    	dd($mail);
    }

    public function sort()
    {
    	if (Input::get('sort') == 'date') {
    		$mail = Mail::where('mail_histories.penerima', Auth::id())
    			->distinct()
    			->orderBy('updated_at', 'desc')
    			->get();
    	}elseif (Input::get('sort' == 'read')) {
    		$mail = Mail::where('mail_histories.penerima', Auth::id())
    			->distinct()
    			->orderBy('read', 'asc')
    			->get();
    	}elseif (Input::get('sort' == 'mark')) {
    		$mail = Mail::where('mail_histories.penerima', Auth::id())
    			->distinct()
    			->orderBy('mark', 'desc')
    			->get();
    	}

    	dd($mail);	
    }

    public function search()
    {
    	$search = Mail::where([
    			['mail_histories.penerima', Auth::id()], 
    			['subject', 'like', '%'.Input::get('keySearch').'%']
    	])->distinct()->orderBy('updated_at', 'desc')->get();

    	dd($search);
    }
}
