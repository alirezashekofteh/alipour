<?php

namespace App\Http\Middleware;

use App\Models\Discount;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class StoreDiscountCode
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
    
        if ($request->has('discount')){
         
            $dis=Discount::whereCode($request->get('discount'))->first();
          
            if($dis->expired_at > now() )
            {
            $response->cookie('discount', $dis->code, 43200);
            }
          
        }
    
        return $response;
    }
}
