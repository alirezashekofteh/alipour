<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Shetabit\Multipay\Payment;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('shetabit-payment', function () {
            $config = config('payment') ?? [];

            return new Payment($config);
        });
        $this->app->bind('path.public', function() {
            return realpath(base_path().'/../public_html');
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Blade::if('vip', function () {
            return auth()->user() && auth()->user()->expire_at > Carbon::now();
        });
    }
}
