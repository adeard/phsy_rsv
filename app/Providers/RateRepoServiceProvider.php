<?php

namespace App\Providers;

use App\Interfaces\RateInterface;
use App\Repositories\RateRepository;
use Illuminate\Support\ServiceProvider;

class RateRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(RateInterface::class, RateRepository::class);
    }
}
