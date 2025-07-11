<?php

namespace App\Providers;

use App\Repositories\Interface\UserRepository;
use App\Repositories\UserRepositoryImpl;
use App\Services\Interface\UserService;
use App\Services\UserServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Bind userRepo dan UserService
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(UserService::class, UserServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
