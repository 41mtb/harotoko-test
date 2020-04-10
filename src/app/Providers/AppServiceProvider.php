<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        |
        --------------------------------------------------------------------------
        | Model
        |
        --------------------------------------------------------------------------
        */
        $this->app->bind('userModel', function(){
            return app('App\Models\User');
        });

        $this->app->bind('orderModel', function(){
            return app('App\Models\Order');
        });

        $this->app->bind('shopModel', function(){
        return app('App\Models\Shop');
        });

        $this->app->bind('ticketModel', function(){
        return app('App\Models\Ticket');
        });


        /*
        |
        --------------------------------------------------------------------------
        | Service
        |
        --------------------------------------------------------------------------
        */
        $this->app->bind('userService', function(){
            return app('App\Services\User');
        });

        $this->app->bind('orderService', function(){
            return app('App\Services\Order');
        });

        $this->app->bind('shopService', function(){
        return app('App\Services\Shop');
        });

        $this->app->bind('ticketService', function(){
        return app('App\Services\Ticket');
        });
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
