<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contacts\OrderItemRepositoryInterface', 'App\Repositories\OrderItemRepository');
       $this->app->bind('App\Repositories\Contacts\UserRepositoryInterface', 'App\Repositories\UserRepository');
        $this->app->bind('App\Repositories\Contacts\ProductRepositoryInterface', 'App\Repositories\ProductRepository');
        $this->app->bind('App\Repositories\Contacts\ItemRepositoryInterface', 'App\Repositories\ItemRepository');
         $this->app->bind('App\Repositories\Contacts\OrderRepositoryInterface', 'App\Repositories\OrderRepository');
    $this->app->bind('App\Repositories\Contacts\CurrencyRepositoryInterface', 'App\Repositories\CurrencyRepository');
  
    }
}
