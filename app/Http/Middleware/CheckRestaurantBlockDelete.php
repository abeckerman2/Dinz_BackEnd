<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class CheckRestaurantBlockDelete
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
        if(Auth()->guard('restaurant')->user()->is_block == 1){

            Auth::guard('restaurant')->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            Session::flash('error','Your restaurant account has been blocked by admin');
            return redirect(url('restaurant/login'));

        }elseif(Auth()->guard('restaurant')->user()->deleted_at != NULL || Auth()->guard('restaurant')->user()->deleted_at != null){
            Auth::guard('restaurant')->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            Session::flash('error','Your restaurant account has been deleted by admin');
            return redirect(url('restaurant/login'));
        }


        return $next($request);
    }
}
