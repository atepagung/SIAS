<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckRole
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

        $role = Auth::user()->sub_role->title;

        if ($role == 'No Role') {
            return redirect()->route('regis');
        }

        return $next($request);
    }
}
