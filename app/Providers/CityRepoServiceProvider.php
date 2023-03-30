<?php

namespace App\Providers;

use App\Interfaces\CityInterface;
use App\Repositories\CityRepository;
use Illuminate\Support\ServiceProvider;

class CityRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(CityInterface::class, CityRepository::class);
    }
}
