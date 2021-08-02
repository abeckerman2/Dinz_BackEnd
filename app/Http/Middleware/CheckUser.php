<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */ 
    // public function handle($request, Closure $next, $guard='web')


    public function handle($request, Closure $next, $guard='restaurant')
    {
        if(!Auth()->guard('restaurant')->check()){
            return redirect(url('restaurant/login'));
        }

        @$ip = $_SERVER['REMOTE_ADDR'];
        
        @$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
        @$ipInfo = json_decode($ipInfo);

        if(isset($ipInfo)){

            if($ipInfo->status == "fail"){
             date_default_timezone_set("UTC");
            }else {
                 @$timezone = $ipInfo->timezone;
                 date_default_timezone_set(@$timezone);
            }
        }else{
            date_default_timezone_set("UTC");
        }
        
        return $next($request);
    }
}
