<?php

namespace LaravelForum\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelForum\channel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('channels', channel::all());
    }
}
