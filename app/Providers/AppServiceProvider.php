<?php

namespace App\Providers;

use App\Repository\CategoryRepository;
use App\Repository\ICategoryRepository;
use App\Repository\IUserRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }
}
