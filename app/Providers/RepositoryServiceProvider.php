<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ApodRepository;
use App\Interfaces\ApodRepositoryInterface;
use App\Interfaces\RoverRepositoryInterface;
use App\Repositories\RoverRepository;

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
        $this->app->bind(RoverRepositoryInterface::class, RoverRepository::class);
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
