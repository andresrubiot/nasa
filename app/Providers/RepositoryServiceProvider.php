<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ApodRepository;
use App\Interfaces\ApodRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApodRepositoryInterface::class, ApodRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
