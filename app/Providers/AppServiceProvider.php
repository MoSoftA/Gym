<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        User::observe(UserObserver::class);
        Schema::defaultStringLength(191);
<<<<<<< HEAD
        /*
        if($this->app->environment() == 'production') {
            \URL::forceScheme('https');
            \URL::forceRootUrl(\Config::get('app.url'));
            */
=======
        if($this->app->environment() == 'production') {
            \URL::forceScheme('https');
            \URL::forceRootUrl(\Config::get('app.url'));
>>>>>>> 18ae2d8122a2a61743e9847d6ddefd5550eb82dd
    }
}
