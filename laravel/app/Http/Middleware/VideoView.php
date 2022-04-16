<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Term;

class VideoView
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
        if(!$request->video->free)
        {
            return $next($request);  
        }
        $termorder=$request->user()->order()->where('status', '1')->where('term_id', $request->term->id);
        if ($termorder->where('installments',0)->count())
        {
            return $next($request);
        }
        $termorder=$request->user()->order()->where('status', '1')->where('term_id', $request->term->id);
        if($termorder->count() and $request->video->installments > 0 )
        {
            if($termorder->where('installments','>=',$request->video->installments)->count())
            {
                
                return $next($request);   
            }
            else
            {
                alert()->error(' با پرداخت قسط دوم این بخش از آموزش برای شما فعال می شود  ', 'پیغام سیستم')->persistent('تایید');
                return back();
            }
        }
        alert()->error(' برای مشاهده باید دوره خریداری شود ', 'پیغام سیستم')->persistent('تایید');
        return back();


       
       
    }
}
