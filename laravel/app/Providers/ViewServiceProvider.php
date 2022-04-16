<?php

namespace App\Providers;
use App\Models\MenuAdmin;
use App\Models\Menu;
use App\Models\Subscription;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('Admin.Layouts.sidebar', function($view) {
            $MenuAdmin = MenuAdmin::where('parent','0')
            ->where('panel','admin')
            ->where('view','1')
            ->orderby('tartib')
            ->get();

            $view->with([
                'MenuAdmin' => $MenuAdmin,
            ]);
        });
        View::composer('Front.Layouts.header', function($view) {
            $Menu = Menu::where('parent','0')
            ->where('view','1')
            ->orderby('tartib')
            ->get();

            $view->with([
                'Menu' => $Menu,
            ]);
        });
        View::composer('Front.Layouts.subscription', function($view) {
            $subscription = Subscription::where('active','1')->get();

            $view->with([
                'subscription' => $subscription,
            ]);
        });
    }
}
