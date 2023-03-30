<?php

namespace App\Providers;

use App\Interfaces\LocationInterface;
use App\Repositories\LocationRepository;
use Illuminate\Support\ServiceProvider;

class LocationRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(LocationInterface::class, LocationRepository::class);
    }
}
