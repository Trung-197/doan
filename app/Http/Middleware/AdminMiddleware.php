<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
//            $id = DB::table('users')
//                ->join('role_user','role_user.user_id','=','users.id')
//                ->join('roles','role_user.role_id','=','roles.id')
//                ->select('users.id')->get();

            if((Auth::user()==null))
            {
                return redirect('/');
            }
            else
            {
                return $next($request);
            }
        }
    }
}
