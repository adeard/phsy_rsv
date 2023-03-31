<?php

namespace App\Providers;

use App\Interfaces\ProvinceInterface;
use App\Repositories\ProvinceRepository;
use Illuminate\Support\ServiceProvider;

class ProvinceRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(ProvinceInterface::class, ProvinceRepository::class);
    }
}
