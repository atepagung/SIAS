<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $hak_akses = DB::table('files_access')->where('user_id', Auth::id())->where('file_id', $request->route()->parameter('id'))->get();

        $role = Auth::user()->sub_role->title;
        
        if ($role != 'Administrator') {
            if ($hak_akses->count() == 0) {
                $request->session()->flash('pesan_error', 'Maaf Anda Tidak Memiliki Hak Akses Terhadap File Ini, Silahkan Hubungi Admin!');
                return redirect()->route('err_access');
            }
        }

        return $next($request);
    }
}
