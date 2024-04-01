<?php

namespace App\Http\Middleware;

use Closure;

class partnerMiddleware
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
        if (Auth()->user()->user_type == "partner" && Auth()->user()->status == "approved") 
        {
            return $next($request);
        } elseif (Auth()->user()->user_type == "partner" && Auth()->user()->status == "pending") 
        {
            $url = Auth()->user()->partner->step_url;
            if ($url) {
                return redirect()->intended($url);
            } else {
                if (Auth()->user()->password) {
                    return redirect()->intended('info/company');
                } else {
                    return redirect()->intended('info/welcome');
                }
            }

            // return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
