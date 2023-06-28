<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Places\Impl\PlaceServiceImpl;
use App\Services\Users\Impl\UserServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(PlaceServiceImpl::class, function () {
            return new PlaceServiceImpl();
        });

        $this->app->singleton(UserServiceImpl::class, function () {
            return new UserServiceImpl();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
