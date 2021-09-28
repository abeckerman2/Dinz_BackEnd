<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckdeleteUser
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

        if(Auth::guard()->user()->deleted_at != NULL){
            return response()->json(['result' => 'Failure'  , 'message' => 'Your account has been deleted by admin.'] , 413);
        }

        return $next($request);
    }
}
