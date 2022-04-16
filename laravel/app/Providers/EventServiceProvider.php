<?php

namespace App\Providers;

use App\Events\TermChannel;
use App\Events\UserReferred;
use App\Listeners\RewardUser;
use App\Listeners\TermChannel as ListenersTermChannel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserReferred::class => [
            RewardUser::class,
        ],
        TermChannel::class=>[
            ListenersTermChannel::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
