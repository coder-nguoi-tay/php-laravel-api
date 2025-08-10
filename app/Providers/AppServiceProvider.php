<?php

namespace App\Providers;

use App\Repositories\TaskRepository\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository\TaskRepository;
use App\Repositories\UserRepository\UserInterface;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
