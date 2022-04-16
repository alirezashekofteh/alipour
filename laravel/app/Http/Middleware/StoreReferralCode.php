<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class StoreReferralCode
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
        $response = $next($request);
    
        if ($request->has('ref')){
           
            $referral =User::whereRefcode($request->get('ref'))->whereType('agent')->first();
            $response->cookie('refellar', $referral->id, 43200);
        }
    
        return $response;
    }
}
