<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkLogin
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
        if(Auth::check()){
            //nếu đã login thì được đi tiếp
            return $next($request);
        }
        else{
            //chưa login thì quay lại trang login thực hiện login
            return redirect()->route('login-form');
        }
        
    }
}
