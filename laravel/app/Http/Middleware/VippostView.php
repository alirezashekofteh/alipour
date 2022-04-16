<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Term;
use Illuminate\Support\Carbon;

class VippostView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->post->type=='off')
        {

            return $next($request);
        }
        if($request->post->type=='user' && auth()->check())
        {
            return $next($request);
        }
        if($request->post->type=='vip' && auth()->check() )
        {
            if($request->user()->expire_at > Carbon::now() )
            {
                return $next($request);
            }

        }
        session()->put('dataurl','/blog/'.$request->post->slug);
        return redirect(route('subscription'));
    }
}
