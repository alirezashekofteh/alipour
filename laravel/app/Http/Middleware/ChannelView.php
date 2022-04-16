<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Channel;

class ChannelView
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
        if ($request->user()->channels()->where('channel_id', $request->channel->id)->where('expire_at', '>', Carbon::now())->count()) {
            return $next($request);
        }
        return abort(403);
    }
}
