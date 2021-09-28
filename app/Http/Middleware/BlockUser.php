<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BlockUser
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

        if(Auth::guard()->user()->is_block == 1){
            return response()->json(['result' => 'Failure'  , 'message' => 'Your account has been blocked by admin.'] , 403);
        }
        return $next($request);
    }
}
