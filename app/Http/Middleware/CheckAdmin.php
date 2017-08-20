<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;
use DB;

class CheckAdmin
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
        $user =DB::table('users')->where('id', '=', Auth::id())->get();
        if(Auth::check() && $user[0]->status !=0){
            return redirect('/');
        }
        return $next($request);
    }
}
